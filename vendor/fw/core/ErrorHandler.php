<?

namespace fw\core;

class ErrorHandler{
    public function __construct(){
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this,'exceptionHandler']);
    }

    public function errorHandler($errno,$errstr,$errfile,$errline){
        if(DEBUG || in_array($errno,[E_USER_ERROR,E_RECOVERABLE_ERROR])){
            $this->displayError($errno,$errstr,$errfile,$errline);
        }
      //  $this->logErrors($errstr,$errfile,$errline);
        error_log("[" . date("Y-m-d H:i:s"). "]  Текст ошибки: {$errstr} | Файл: {$errfile} | Строка: {$errline}\n========================================\n",3, ERROR);
       
        return true;//отключаем обработку ошибок от php
    }

    public function fatalErrorHandler(){
       
        $error = error_get_last();
        if(!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
         //   $this->logErrors($error['message'],$error['file'],$error['line']);
            error_log("[" . date("Y-m-d H:i:s"). "]  Текст ошибки: {$error['message']} | Файл: {$error['file']} | Строка: {$error['line']}\n========================================\n",3,ERROR);
            ob_end_clean();
            $this->displayError($error['type'],$error['message'],$error['file'],$error['line']);
        }else{
            ob_end_flush();
        }
    }

    /**TO-DO
     * почему возникает 
     * Uncaught Error: Call to undefined function D:\OpenServer\domains\framework\fw\core\ErrorHandler.php() in D:\OpenServer\domains\framework\fw\core\ErrorHandler.php:41 Stack trace: #0 D:\OpenServer\domains\framework\fw\core\ErrorHandler.php(46): fw\core\ErrorHandler->logErrors('Call to undefin...', 'D:\\OpenServer\\d...', 41) #1 [internal function]: fw\core\ErrorHandler->exceptionHandler(Object(Error)) #2 {main} thrown in D:\OpenServer\domains\framework\fw\core\ErrorHandler.php on line 41
     * при вызове функции logErrors в других методах данного класса
     */
    protected function logErrors($message = '',$file = '', $line = ''){
        var_dump(error_log("[" . date("Y-m-d H:i:s"). "]  Текст ошибки: {$message} | Файл: {$file()} | Строка: {$line()}\n========================================\n",3,ERROR));
        error_log("[" . date("Y-m-d H:i:s"). "]  Текст ошибки: {$message} | Файл: {$file()} | Строка: {$line()}\n========================================\n",3,ERROR);
    }

    public function exceptionHandler($e){
      //  $this->logErrors($e->getMessage(),$e->getFile(),$e->getLine());
        error_log("[" . date("Y-m-d H:i:s"). "]  Текст ошибки: {$e->getMessage()} | Файл: {$e->getFile()} | Строка: {$e->getLine()}\n========================================\n",3,ERROR);
        $this->displayError('Exception',$e->getMessage(),$e->getFile(),$e->getLine(),$e->getCode());
    }

    protected function displayError($errno,$errstr,$errfile,$errline,$response = 500){
        http_response_code($response);
       // define(DEBUG,1);
        if($response == 404 && !DEBUG){
            require WWW . '/errors/404.html';
        }
        if(DEBUG){
            require WWW . '/errors/dev.php';
        }else{
         //   echo DEBUG;
            require WWW . '/errors/prod.php';
        }
        die;
    }
}