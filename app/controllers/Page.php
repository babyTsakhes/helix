<?
namespace app\controllers;
use vendor\core\base\Controller;

class Page extends App{

    public function indexAction(){
        echo "Page::index";
    }

    public function viewAction(){
        echo "Page::view";
    }
    
}