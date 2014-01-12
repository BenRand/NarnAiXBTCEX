<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 4:01 PM
 */

//require_once('database_object.php');

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


}


