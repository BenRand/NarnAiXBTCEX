<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 4:01 PM
 */

require_once('database.php');

/**
 * BugTracker Object.
 *
 * Needs extensive work, yup. feel free to help.
 */

class Bugtrack extends DatabaseObject{
    protected static $table_name = "bugtrack";
    protected static $db_fields = array('id', 'title', 'description', 'type', 'priority', 'createdby', 'createdon', 'closedby', 'closedon', 'res');
	public $id;
	public $title;
	public $description;
    public $type;
    public $priority;
    public $createdon;
    public $createdby;
    public $closedon;
    public $closedby;
    public $res;


    public static function find_all(){
		global $database;
		// $result_set = $database->query("SELECT * FROM user");
		// return $result_set;
		return self::find_by_sql("SELECT * FROM " . self::$table_name );
	}
	public static function find_by_id($id=0){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	public static function find_by_sql($sql=""){
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();

		while ($row = $database->fetch_array($result_set)){
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}
	private static function instantiate($record){
		$object = new self();
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
        foreach(self::$db_fields as $field) {
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

        $sql = "INSERT INTO ". self::$table_name ."(";
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
        $sql = "UPDATE ". self::$table_name ." SET ";
        $sql .= join(", ", $attribute_pairs);
        $sql .= " WHERE id=" . $this->id;
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;
    }
    public function delete(){             /**  CRUD   */
        global $database;

        $sql = "DELETE FROM ". self::$table_name;
        $sql .= " WHERE id=" . $this->id;
        $sql .= " LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows() == 1) ? true : false;


    }
}


