<?php
namespace app\controllers;

use app\models\Main;
use classes\Cache;
use vendor\fw\core\Registry;
use vendor\fw\core\App;
use vendor\core\base\View;

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
      /*   $this->setMeta('Главная страница333','mainpage ahahah ','ключевые слова aliexpress mvideo');
        $meta = $this->meta; */
        View::getMeta('MAIN PAGE', 'main page of framework','framework');
        $this->set(compact('posts','menu','meta'));
    
    }

    public function viewAction(){
        echo "Main::view";
    }

    public function testAction(){
        if($this->isAjax())
        {
            $model = new Main;
    /*         $data = ['answer' => 'Ответ с  сервера', 'code'=>200];
            echo json_encode($data); */

            $post = \R::findOne('posts',"id = {$_POST['id']}");
            $this->loadView('_test',compact('post'));
          //  debug($post);
            die;
        }
        echo 222;
    }
    
}