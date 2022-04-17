<?
echo 123;
require "rb.php";
$db = require "../config/config_db.php";
R::setup($db['dsn'],$db['user'],$db['pass'], $optionsPDO);