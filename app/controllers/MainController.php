<?php
namespace app\controllers;

use app\models\Main;
use classes\Cache;
use vendor\core\Registry;


class MainController extends AppController{

    public $layout = 'main';

    public function indexAction(){
        \vendor\core\App::$app->getList();
        $model = new Main;
        $posts = \R::findAll('posts');
        $menu = $this->menu;
        $title  = "POSTS";
        $this->setMeta('Главная страница111','mainpage ahahah ','ключевые слова aliexpress mvideo');
        $this->test();
        $meta = $this->meta;
        //debug($categories);
        $this->set(compact('posts','menu','meta'));
    
    }

    public function viewAction(){
        echo "Main::view";
    }
    
}