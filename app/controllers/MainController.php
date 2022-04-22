<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController{

    public $layout = 'main';

    public function indexAction(){
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