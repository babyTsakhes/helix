<?php
require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
$query =  rtrim($_SERVER['QUERY_STRING'],'/');
/* Router::add('posts/add',['controller'=>'Posts','action'=>'add']);
Router::add('posts',['controller'=>'Posts','action'=>'add']);
Router::add('posts',['controller'=>'Main','action'=>'index']); */
Router::add('^index.php$',['controller'=>'Main','action'=>'index']);
Router::add('^index.php&(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::dispatch($query);
/* if(Router::matchRoute($query)){
  //  debug(Router::getRoute());
}else{
    echo '404';
} */