<?php
namespace app\controllers;

use app\models\Main;
use classes\Cache;
use vendor\core\Registry;
use vendor\core\App;


class MainController extends AppController{

    public $layout = 'main';

    public function indexAction(){
        //App::$app->getList();
        $model = new Main;
        $posts = \R::findAll('posts');
        App::$app->cache->set('posts',$posts,3600*24);
        echo date('Y-m-d H:i:s', time());
        echo '<br>';
        echo date('Y-m-d H:i:s',1650733906);
        $menu = $this->menu;
        $title  = "POSTS";
        $this->setMeta('Главная страница111','mainpage ahahah ','ключевые слова aliexpress mvideo');
       // $this->test();
        $meta = $this->meta;
        //debug($categories);
        $this->set(compact('posts','menu','meta'));
    
    }

    public function viewAction(){
        echo "Main::view";
    }
    
}