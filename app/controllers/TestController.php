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
       
        if(!empty($_SESSION['user'])){
            $test = \R::findOne('tests',"id={$_GET['id']}");
           // debug($_SESSION);
           $username = $_SESSION['user']['name'];
         
          
          
            $questions = \R::findAll('questions',"test_id = {$test['id']}");
            $questionCount = \R::count('questions',"test_id = {$test['id']}");
            $answers = \R::findAll('answers', "test_id = {$test['id']}");
            $this->set(compact(
                'test',
                'questions',
                'answers',
                'questionCount',
                'username'
            ));
        }
        else{
            redirect("");
        }
      
    }
   

    public function resultAction()
    {
       // debug("djfjkds",1);
       $test = \R::findOne('tests',"id={$_GET['id']}");
       $testid = $test['id'];
        $userid = $_SESSION['user']['id'];
        $username = $_SESSION['user']['name'];
        if(!empty($_POST)){
            if($_POST['q'] == "0"){
                $sum = 0;
                foreach($_POST as $q){
                    $sum+=$q;
                }
                
                \R::exec( "UPDATE user SET result$testid='$sum' WHERE id = '$userid'");
               }
        }

       {
        $result = \R::findAll('results', "test_id = {$testid} AND score_min < {$sum} AND score_max > {$sum}");
       // debug($result);
        $this->set(compact(
            'result',
            'username'
        ));
    }
}

}
