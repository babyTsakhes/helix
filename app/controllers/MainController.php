<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController{

    public $layout = 'main';

    public function indexAction(){
        $model = new Main;
        $posts = $model->findAll();
        $title  = "POSTS";
        $post = $model->findOne(2);
        debug($post);
        $this->set(compact('posts','title'));
    
    }

    public function viewAction(){
        echo "Main::view";
    }
    
}