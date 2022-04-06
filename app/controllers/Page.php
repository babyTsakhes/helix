<?
namespace app\controllers;
use vendor\core\base\Controller;

class Page extends Controller{

    public function indexAction(){
        echo "Page::index";
    }

    public function viewAction(){
        debug($_GET);
        echo "Page::view";
    }
    
}