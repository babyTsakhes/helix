<?php

namespace app\controllers;

use app\models\Main;
use app\models\User;
use classes\Cache;
use fw\core\Registry;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Valitron\Validator as V;

class TestController extends AppController
{

    public $layout =  'default';

    public function indexAction()
    {
      
        //unset($_SESSION);
        if(!empty($_SESSION['user'])){
           $user_name = $_SESSION['user']['name'];
           $tests = \R::findAll('tests');
           $this->set(compact('user_name','tests'));
         
        }
        else{
            redirect("");
        }
    }


    public function onetestAction(){
        $test = \R::findOne('tests',"id={$_GET['id']}");
       if($_POST['q'] == "0"){
        $sum = 0;
        foreach($_POST as $q){
            $sum+=$q;
        }
       }
      
        $questions = \R::findAll('questions',"test_id = {$test['id']}");
    //    debug($questions["id"],1);
      $questionCount = \R::count('questions',"test_id = {$test['id']}");
        $answers = \R::findAll('answers', "test_id = {$test['id']}");
      //  debug($answers,1);
        $this->set(compact(
            'test',
            'questions',
            'answers',
            'questionCount'
        ));
    }
   
    public function allAction()
    {
        if ($this->isAjax()) {
            $model = new Main;
            /*         $data = ['answer' => 'Ответ с  сервера', 'code'=>200];
            echo json_encode($data); */

            $post = \R::findOne('posts', "id = {$_POST['id']}");
            $this->loadView('_test', compact('post'));
            //  debug($post);
            die;
        }
        echo 222;
    }
}
