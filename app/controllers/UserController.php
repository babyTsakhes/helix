<?
namespace app\controllers;
use app\controllers\AppController;
use app\models\User;
use fw\core\base\View;

class UserController extends AppController{

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User;
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data)){
                echo "No VAL";
                $user->getErrors();
            }else{
                echo "No";
            }
           
        }
        //echo 123;die;
        View::setMeta("Регистрация");
    }

    public function loginAction(){

    }

    public function logoutAction(){

    }

}