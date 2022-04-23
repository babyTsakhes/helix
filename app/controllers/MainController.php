<?php
namespace app\controllers;

use app\models\Main;
use classes\Cache;
use vendor\core\Registry;
use vendor\core\App;


class MainController extends AppController{

    public $layout = 'default';

    public function indexAction(){
        $model = new Main;
        $posts = App::$app->cache->get('posts');
        if(!$posts)
        {
            $posts = \R::findAll('posts');
            App::$app->cache->set('posts',$posts,3600*24);
        }
        $menu = $this->menu;
        $title  = "POSTS";
        $this->setMeta('Главная страница333','mainpage ahahah ','ключевые слова aliexpress mvideo');
        $meta = $this->meta;
        $this->set(compact('posts','menu','meta'));
    
    }

    public function viewAction(){
        echo "Main::view";
    }

    public function testAction(){
        echo 111;die;
        echo "GGGGGTEST";
    }
    
}