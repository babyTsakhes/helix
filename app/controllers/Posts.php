<?
namespace app\controllers;

use vendor\core\base\Controller;

class Posts extends Controller{
    public function indexAction(){
        echo "Posts::indexAction";
    }

    public function testAction(){
        debug($this->route);
        echo "Posts::testAction";
    }
}