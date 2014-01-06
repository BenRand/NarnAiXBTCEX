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

define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('SVR_ROOT', $_SERVER['SERVER_NAME']);

require_once('config.php');
require_once('functions.php');
require_once('session.php');
require_once('database.php');
require_once('user.php');
// require_once('nav.php');

