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

class MainController extends AppController
{

    public $layout =  'proga';

    public function indexAction()
    {
        //unset($_SESSION);
        $this->layout = (!empty($_SESSION['main_temp_code'])) ? $_SESSION['main_temp_code'] :  'test';
        //debug($_SESSION,1);
        $lang = App::$app->getProperty('lang')['code'];
        $workers = \R::findAll('workers', 'lang_code = ?', [$lang]);
        View::setMeta('MAIN PAGE', 'main page of framework', 'framework');
        $this->set(compact('workers'));
    }

    public function imtAction()
    {
        $this->layout = 'default';
        $weight = $_POST['weight'];
        $height = $_POST['height'] / 100;
        if(!empty($weight) && !empty($height)){
            $validator = new V(['weight' => $weight, 'height' => $height]);
        $validator->rule('numeric', ['weight', 'height']); 
        if ($validator->validate()) {
            $imt = round($weight / ($height * $height), 2);
            if ($imt <= 16.0) {
                $message = 'Выраженный дефицит массы тела';
            }
            if ($imt > 16.0 && $imt <= 18.5) {
                $message = 'Недостаточная (дефицит) масса тела';
            }
            if ($imt > 18.5 && $imt <= 25.0) {
                $message = 'Норма';
            }
            if ($imt > 25 && $imt <= 30.0) {
                $message = 'Избыточная масса тела (предожирение)';
            }
            if ($imt > 30) {
                $message = 'Одна из степеней ожирения. Обратитесь к врачу.';
            }

            $this->set(compact('imt', 'message', 'user'));
        } else {
            $_SESSION['errorIMT'] = "Вы должны записать числовые значения в поля Вес и Рост.";
        }
        }else{
            $_SESSION['errorIMT'] = "Вы должны записать числовые значения в поля Вес и Рост. Обя поля обязательны.";
        }
    }

    public function testAction()
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
