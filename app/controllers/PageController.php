<?
namespace app\controllers;
use vendor\core\base\Controller;

class PageController extends AppController{

    public function indexAction(){
        echo "Page::index";
    }

    public function viewAction(){
        echo "Page::view";
    }
    
}