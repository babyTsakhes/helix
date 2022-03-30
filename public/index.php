<?php
require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
$query =  rtrim($_SERVER['QUERY_STRING'],'/');
debug($query);


Router::add('posts/add',['controller'=>'Posts','action'=>'add']);
//debug(Router::getRoutes());

if(Router::matchRoute($query)){
    echo 12312;
    debug(Router::getRoute());
}else{
    echo '404';
}