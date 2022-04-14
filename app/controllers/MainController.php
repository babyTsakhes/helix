<?php
namespace app\controllers;

use app\models\Main;

class MainController extends AppController{

    public $layout = 'main';

    public function indexAction(){
        $model = new Main;
        $posts = $model->findAll();
        $title  = "POSTS";
        $post = $model->findOne('ff');
        $data = $model->findBySql("SELECT * FROM {$model->table} WHERE text LIKE ? ORDER BY id DESC LIMIT 2",['%dg%']);

        debug($data);
        $this->set(compact('posts','title'));
    
    }

    public function viewAction(){
        echo "Main::view";
    }
    
}