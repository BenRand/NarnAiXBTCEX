<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 4:01 PM
 */

// error_reporting(E_ALL);
// ini_set('display_errors', '1');


// Define core paths
// Define them as absolutes to make sure require_once works as needed
// 
// DIRECTORY_SEPERATOR is a PHP predefined constant
// (\ for Windows, / for Unix)
// defined('DS') ? null : define('DS', DIRECTORY_SEPERATOR);

// ------- DEBUGGING CODES --------- //
error_reporting(E_ALL);
ini_set('display_errors', '1');

define("AUTO_LOGOUT", false);
// ---------------------------------//

define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SVR_ROOT', $_SERVER['SERVER_NAME']);

defined("MODEL_PATH")
or define("MODEL_PATH", realpath(dirname(__FILE__) . '/../MODEL') . '/');

defined("VIEW_PATH")
or define("VIEW_PATH", realpath(dirname(__FILE__) . '/../VIEW') . '/');

defined("CONTROL_PATH")
or define("CONTROL_PATH", realpath(dirname(__FILE__) . '/../CONTROL') . '/');

require_once(CONTROL_PATH . 'config.php');
require_once(CONTROL_PATH . 'functions.php');
require_once(MODEL_PATH . 'session.php');
require_once(MODEL_PATH . 'database.php');
require_once(MODEL_PATH . 'user.php');

/** @todo figure out where nav object/function goes in MVC */
//require_once(MODEL_PATH . '/nav.php');


