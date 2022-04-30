<?
namespace app\controllers;
use fw\core\base\Controller;

class PageController extends AppController{

    public $layout = 'main';

    public function indexAction(){
        echo "Page::index";
    }

    public function viewAction(){
        $this->layout = 'test';
        $title = "PAGE TITLE";
        $menu = $this->menu;
        $this->set(compact('posts','title','menu'));
    }
}