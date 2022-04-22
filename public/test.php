<?
require "rb.php";
$db = require "../config/config_db.php";
R::setup($db['dsn'],$db['user'],$db['pass'], $optionsPDO);

//Create
/* $cat = R::dispense("category");
$cat->title = "Категория  negfgd";
$id = R::store($cat);
var_dump($id); */

$cat = R::load('category',2);
echo $cat->title;