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
   

    public function result3Test($arr, $userid){
        debug($arr);
        for($i = 41; $i <= 70; $i++){
            $sum1 = 0;
            $sum2 = 0;
            $sum3 = 0;
            $sum4 = 0;
            $sum5 = 0;
           
           
            if($i == 41 || $i == 42 || $i == 44 || $i == 57 || $i == 59 || $i == 65){
                $sum1 += $arr[$i];
                echo $i."<br>";
                debug($sum1);
                \R::exec( "UPDATE user SET result3_1='$sum1' WHERE id = '$userid'");
            }
            else if($i == 43 || $i == 47 || $i == 48 || $i == 50 || $i == 58 || $i == 70){
                $sum2 += $arr[$i];
                \R::exec( "UPDATE user SET result3_2='$sum2' WHERE id = '$userid'");
            }
            else if($i == 45 || $i == 46 || $i == 53 || $i == 62 || $i == 54 || $i == 66){
                $sum3 += $arr[$i];//5, 6, 13, 14, 16, 22
                \R::exec( "UPDATE user SET result3_3='$sum3' WHERE id = '$userid'");
            }
            else if($i == 49 || $i == 51 || $i == 60 || $i == 61 || $i == 63 || $i == 68){
                $sum4 += $arr[$i];//9, 11, 20, 21, 23, 28
                \R::exec( "UPDATE user SET result3_4='$sum4' WHERE id = '$userid'");
            }
            else if($i == 52 || $i == 55 || $i == 64 || $i == 66 || $i == 67 || $i == 69){
                $sum5 += $arr[$i];//12, 15, 24, 26, 27, 29
                \R::exec( "UPDATE user SET result3_5='$sum5' WHERE id = '$userid'");
            }
           

          //  debug($sum1,1);
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
                debug($_POST);
                debug($sum);
                debug($testid);
                \R::exec( "UPDATE user SET result$testid='$sum' WHERE id = '$userid'");

                if($testid == "3"){
                    debug(123);
                    $this->result3Test($_POST, $userid);
                }
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
