<?php
require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
require '../app/controllers/Main.php';
require '../app/controllers/Posts.php';
require '../app/controllers/PostsNew.php';
$query =  rtrim($_SERVER['QUERY_STRING'],'/');
Router::add('^index.php$',['controller'=>'Main','action'=>'index']);
Router::add('^index.php&(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::dispatch($query);