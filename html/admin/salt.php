<?php
/**
 * Created by PhpStorm.
 * User: sebastianusami
 * Date: 1/6/14
 * Time: 5:11 PM
 */

$password = 'abcdefg';
$salt = 'anythingyouwant_';
$pw_hash = md5($salt.$password);