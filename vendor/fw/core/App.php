<?
namespace vendor\fw\core;

use vendor\fw\core\Registry;
use vendor\core\ErrorHandler;

class App{
    public static $app;

    public function __construct(){
        self::$app = Registry::instance();
        new ErrorHandler();
    }
}