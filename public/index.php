<?php
error_reporting(-1);
use vendor\core\Router;
define ('WWW',__DIR__);
define ('CORE',dirname(__DIR__).'/vendor/core');
define ('ROOT',dirname(__DIR__));
define ('APP',dirname(__DIR__).'/app');
//require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
/* require '../app/controllers/Main.php';
require '../app/controllers/Posts.php';
require '../app/controllers/PostsNew.php'; */

spl_autoload_register(function($class){
    $file = ROOT.'\\'.str_replace("//",'\\',$class).'.php';
    debug($file);
   // $file = APP."/controllers/$class.php";
    if(file_exists($file))
    {
        require_once $file;
    }
} );
$query =  rtrim($_SERVER['QUERY_STRING'],'/');
Router::add('^index.php&pages/?(?P<action>[a-z-]+)?$',['controller'=>'Posts']);
//default routes
Router::add('^index.php$',['controller'=>'Main','action'=>'index']);
Router::add('^index.php&(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::dispatch($query);