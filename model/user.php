<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 4:01 PM
 */

require_once('database_object.php');

/**
 * User Object.  
 *
 * Needs extensive work, yup. feel free to help.
 */

class User extends databaseObject {
    protected static $table_name = "users";
    protected static $db_fields = array('id', 'username', 'password', 'first_name', 'last_name', 'email', 'password_hash', 'salt', 'alias');
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $email;
    public $password_hash;
    public $salt;
    public $alias;


    public static function authenticate($username="", $password=""){
        global $database;

        /** @var  $password_hash
         *  TODO: Fix password hash.  needs dynamic salt.
         */
        $password_hash = hash('sha256', 'saltmotherfucker' . $password);

        $sql = "SELECT * FROM ".self::$table_name;
        $sql .= " WHERE username = '{$username}' ";
        $sql .= "AND password_hash = '{$password_hash}' ";
        $sql .= "LIMIT 1";

        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    public function full_name(){
        if(isset($this->first_name) && isset($this->last_name)){
            return $this->first_name . " " . $this->last_name;
        } else {
            return "none";
        }
    }


}


