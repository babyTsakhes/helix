<?
namespace app\controllers;

use vendor\core\base\Controller;

class PostsController extends AppController{
    public function indexAction(){
        echo "Posts::indexAction";
    }

    public function testAction(){
        echo "Posts::testAction";
    }
}