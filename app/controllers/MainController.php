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
        $this->test();
       

        //debug($categories);
        $this->set(compact('posts','title','menu'));
    
    }

    public function viewAction(){
        echo "Main::view";
    }
    
}