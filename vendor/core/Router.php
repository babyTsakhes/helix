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
                foreach($matches as $key => $value)
                {
                    if(is_string($key))
                    {
                        $route[$key] = $value;
                    }
                    if(!isset($route['action']))
                        $route['action'] = 'index';
                }
                self::$route = $route;
            return true;
            }
        }
        return false;
    }

    /**
     * перенаправляет URL по правильному маршруту 
     * @param string $url входящий URL
     * @return void
     */
    public static function dispatch($url){
        if(self::matchRoute($url)){
            $controller = self::upperCamelCase(self::$route['controller']);
            if(class_exists($controller))
            {
                $controllerObj = new $controller;
            }
            else
            {
                echo "Контроллер <b>$controller</b> не найден";
            }
            $action = self::$route['action'];
        }else{
            http_response_code(404);
            include '404.html';
        }
    }

    /**
     * создает из URL название контроллера
     * @param string $name
     * @return string $name
     */
    protected static function upperCamelCase($name){
        $name = str_replace('-',' ',$name);
        $name = ucwords($name);
        $name = str_replace(' ','',$name);
        return $name;
        
    }
}