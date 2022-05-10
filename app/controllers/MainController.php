<?php
namespace app\controllers;

use app\models\Main;
use classes\Cache;
use fw\core\Registry;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MainController extends AppController{

    public $layout = 'proga';

    public function indexAction(){
        $workers = \R::findAll('workers');
        View::setMeta('MAIN PAGE', 'main page of framework','framework');
        $this->set(compact('workers'));
    
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