<?php

class Router{

    /* public function __construct(){
        echo "Роутер был создан!";
    } */

    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []){
           self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    public static function matchRoute($url){
        $matches = [];
        foreach (self::$routes as $pattern=> $route){
            if(preg_match("#$pattern#i",$url,$matches)){
                debug($matches);
                foreach($matches as $key => $value)
                {
                    if(is_string($key))
                    {
                        $route[$key] = $value;
                    }
                }
                self::$route = $route;
                debug($route);
            return true;
            }
        }
        return false;
    }

    public static function dispatch($url){
        if(self::matchRoute($url)){
            echo "Ok";
        }else{
            http_response_code(404);
            include '404.html';
        }
    }
}