<?php
error_reporting(-1);
use vendor\core\Router;
define ('WWW',__DIR__);
define ('CORE',dirname(__DIR__).'/vendor/core');
define ('ROOT',dirname(__DIR__));
define ('APP',dirname(__DIR__).'/app');
define('LAYOUT','default');
//require '../vendor/core/Router.php';
require '../vendor/libs/functions.php';
/* require '../app/controllers/Main.php';
require '../app/controllers/Posts.php';
require '../app/controllers/PostsNew.php'; */

spl_autoload_register(function($class){
    $file = ROOT.'\\'.str_replace("//",'\\',$class).'.php';
   // $file = APP."/controllers/$class.php";
    if(file_exists($file))
    {
        require_once $file;
    }
} );
$query =  rtrim($_SERVER['QUERY_STRING'],'/');

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$',['controller'=>'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$',['controller'=>'Page','action'=>'view']);
//default routes
Router::add('^$',['controller'=>'Main','action'=>'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)$');
Router::dispatch($query);