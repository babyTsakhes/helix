<?php

define("DEBUG", 1);//1 - это режим разработки

class ErrorHandler{

    public function __construct(){
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }

    public function errorHandler($errno,$errstr,$errfile,$errline){
     //   var_dump($errno,$errstr,$errfile,$errline);
        $this->displayError($errno,$errstr,$errfile,$errline);
        return true;//отключаем обработку ошибок от php
    }

    public function fatalErrorHandler(){
        $error = error_get_last();
        if(!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
            ob_end_clean();
            $this->displayError($error['type'],$error['message'],$error['file'],$error['line']);
        }else{
            ob_end_flush();
        }
    }

    protected function displayError($errno,$errstr,$errfile,$errline,$response = 500){
        http_response_code($response);
        if(DEBUG){
            require 'views/dev.php';
        }else{
            require 'views/prod.php';
        }
        die;
    }
}
//$test = 99;
new ErrorHandler;
echo $test;