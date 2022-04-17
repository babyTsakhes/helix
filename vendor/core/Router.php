<?php
namespace vendor\core;
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
                $route['controller'] = self::upperCamelCase($route['controller']); 
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
        
        $url = self::removeQueryString($url);
        
        if(self::matchRoute($url)){
            
            $controller = "app\controllers\\".self::$route['controller']."Controller";
            if(class_exists($controller))
            {
                $cObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']).'Action';

                if(method_exists($cObj,$action))
                {
                    $cObj->$action();
                    $cObj->getView();
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

      /**
     * создает из URL название актиона
     * @param string $actionName
     * @return string $actionName
     */
    protected static function lowerCamelCase($actionName){
        return lcfirst(self::upperCamelCase($actionName));
    }

    /**
     * образает в URL GET-параметры
     * @param string $url
     * @return string $url
     */
    protected static function removeQueryString($url){
        $url = ltrim($url,'index.php');
        $url = ltrim($url,'&');
        if($url){
            $params = explode('&',$url,2);
            if(!strpos($params[0],'='))
            {
                return rtrim($params[0],'/');
            }else{
                return '';
            }
            
        }
    }


}