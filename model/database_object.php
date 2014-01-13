<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/12/14
 * Time: 5:49 PM
 */
class DatabaseObject{
//    protected static $table_name;

    private $connection;
    public 	$last_query;
    private $magic_quotes_active;
    private $real_escape_string_exists;

    function __construct() {
        $this->open_connection();
        /**
         *
         * @todo  remove magic quote usage
         *
         */
        $this->magic_quotes_active = get_magic_quotes_gpc();
        $this->real_escape_string_exists = function_exists( "mysql_real_escape_string" );
    }
    public function open_connection() {
        // $this->connection = new PDO('mysql:host=localhost;dbname=dev_env', DB_USER, DB_PASS);    // FOR PDO INEGRATION
        $this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
        if (!$this->connection) {
            die("Database connection failed: " . mysql_error());
        } else {
            $db_select = mysql_select_db(DB_NAME, $this->connection);
            if (!$db_select) {
                die("Database selection failed: " . mysql_error());
            }
        }
    }
    public function close_connection() {
        if(isset($this->connection)) {
            mysql_close($this->connection);
            unset($this->connection);
        }
    }
    public function query($sql) {
        $this->last_query = $sql;
        // $result = $connection->query($sql);    // FOR PDO INTEGRATION
        $result = mysql_query($sql, $this->connection);
        $this->confirm_query($result);
        return $result;
    }
    /**
     *
     *   Escape_value routine, to be removed
     *
     *
     * 		@todo  remove magic quote usage
     *
     *
     *
     * 		@deprecated magic quotes deprecated as of PHP v5, will be REMOVED in version 6.
     *  	            recommend to use database integrated options
     *
     */
    public function escape_value( $value ) {
        if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
            // undo any magic quote effects so mysql_real_escape_string can do the work
            if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
            $value = mysql_real_escape_string( $value );
        } else { // before PHP v4.3.0
            // if magic quotes aren't already on then add slashes manually
            if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
            // if magic quotes are active, then the slashes already exist
        }
        return $value;

    }
    // "database-neutral" methods
    public function fetch_array($result_set) {
        return mysql_fetch_array($result_set);
    }
    public function num_rows($result_set) {
        return mysql_num_rows($result_set);
    }
    public function insert_id() {
        // get the last id inserted over the current db connection
        return mysql_insert_id($this->connection);
    }
    public function affected_rows() {
        return mysql_affected_rows($this->connection);
    }
    private function confirm_query($result) {
        if (!$result) {
            $output = "<br />Database query failed: " . mysql_error() . "<br /><br />";
            // $output .= "Last SQL query: " . $this->last_query;
            die( $output );
        }
    }


    public static function find_all(){
        global $database;
        // $result_set = $database->query("SELECT * FROM user");
        // return $result_set;
        return static::find_by_sql("SELECT * FROM " . static::$table_name);
    }
    public static function find_by_id($id=0){
        global $database;
        // $result_set = $database->query("SELECT * FROM user WHERE id={$id}");
        // $found = $database->fetch_array($result_set);
        // return $found;
        $result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    public static function find_by_sql($sql=""){
        global $database;
        $result_set = $database->query($sql);
        $object_array = array();

        while ($row = $database->fetch_array($result_set)){
            $object_array[] = static::instantiate($row);
        }
        return $object_array;
    }
    private static function instantiate($record){
        $object = new static();
        foreach($record as $attribute=>$value){
            if ($object->has_attribute($attribute)){
                $object->$attribute = $value;
            }
        }
        return $object;
    }
    private function has_attribute($attribute){
        $object_vars = $this->attributes();
        return array_key_exists($attribute, $object_vars);
    }
    protected function attributes() {
        // return an array of attribute names and their values
        /** todo: consider using SQL SHOW FIELDS TO DO THIS DYNAMICALLY */
        $attributes = array();
        foreach(static::$db_fields as $field) {
            if(property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }
    protected function sanitized_attributes(){
        global $database;
        $clean_attributes = array();
        //sanitize attributes before subbmitting
        //note: does not alter actual value of attribute
        foreach($this->attributes() as $key => $value){
            $clean_attributes[$key] = $database->escape_value($value);
        }
        return $clean_attributes;
    }
    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }
    public function create(){      /**  CRUD   */
        global $database;
        $attributes = $this->attributes();

        $sql = "INSERT INTO ". static::$table_name ."(";
        $sql .= join(", ", array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        if ($database->query($sql)){
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }

    }
    public function update(){             /**  CRUD   */
        global $database;

        $attributes=$this->attributes();
        $attribute_pairs = array();

        foreach($attributes as $key => $value){
            $attribute_pairs[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE ". static::$table_name ." SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE id=" . $this->id;
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }
    public function delete(){             /**  CRUD   */
        global $database;

        $sql = "DELETE FROM ". static::$table_name;
        $sql .= " WHERE id=" . $this->id;
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;


    }


}

$database = new DatabaseObject();
$db =& $database;

