<?
namespace app\controllers;
use vendor\core\base\Controller;

class PageController extends AppController{

    public $layout = 'main';

    public function indexAction(){
        echo "Page::index";
    }

    public function viewAction(){
        $title = "PAGE TITLE";
        $menu = $this->menu;
        $this->set(compact('posts','title','menu'));
    }
    
}