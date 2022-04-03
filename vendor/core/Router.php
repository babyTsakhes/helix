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
                $cObj = new $controller;
                $action = self::lowerCamelCase(self::$route['action']);

                if(method_exists($cObj,$action))
                {
                    $cObj->$action();
                }else{
                    echo "Метода<b>$action</b> у контроллера<b>$controller</b> нет";
                }
            }
            else
            {
                echo "Контроллер <b>$controller</b> не найден";
            }
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

    protected static function lowerCamelCase($actionName){
        $actionName = str_replace('-',' ',$actionName);
        $actionName = ucwords($actionName);
        $actionName = str_replace(' ','',$actionName);
        $actionName = lcfirst($actionName);
        return $actionName;
    }
}