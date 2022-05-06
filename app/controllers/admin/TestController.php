<?
namespace app\controllers\admin;

class TestController extends AppController{
    public function indexAction(){
        echo 123;
        echo __METHOD__;
    }

    public function testAction(){
        echo __METHOD__;
    }
}