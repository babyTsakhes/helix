<?
namespace app\controllers;

use vendor\core\base\Controller;

class PostsNewController extends AppController{

    public function __construct(){
        echo "PostsNew::construct()";
    }

    public function indexAction(){
        echo "PostsNew::index";
    }

    public function testAction(){
        echo "PostsNew::test";
    }

    public function testPageAction(){
        echo "PostsNew::testPage";
    }

    public function before(){
        echo "PostsNew::before";
    }


}