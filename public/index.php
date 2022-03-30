<?php

$query =  rtrim($_SERVER['QUERY_STRING'],'/');
require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';

Router::add('posts/add',['controller'=>'Posts','action'=>'add']);
debug(Router::getRoutes());

if(Router::matchRoute($query)){
    debug(Route::getRoute());
}else{
    echo '404';
}