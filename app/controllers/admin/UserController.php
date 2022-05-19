<?

namespace app\controllers\admin;

use app\models\User;
use fw\core\base\View;

class UserController extends AppController{
    public $layout = 'default';
    public function indexAction(){
        debug($this->route);
        View::setMeta('Admin','admin panel','admin page');
      /*   $test = "Testovaya ";
        $data = [
            'test',
            2
        ];
        $this->set([
            'test'=>$test,
            'data'=>$data
        ]);
        echo __METHOD__; */
    }

    public function loginAction(){
   //     debug($_POST,1);
        if(!empty($_POST)){
            $user = new User;
            (var_dump($user->login(true)));
            if(!$user->login(true)){
                $_SESSION['error'] = 'Логин пароль введены неверно';
            }else{
                if(User::isAdmin()){
                    redirect('/admin/');
                }else{
                    redirect();
                }
            }
           
        }
        $this->layout = 'login';
    }

    public function testAction(){
        echo __METHOD__;
    }

    public function allAction(){
        $users = \R::findAll('user');
       // debug($users);
        $this->set(compact('users'));
    }

    public function createUserAction(){
        if(!empty($_POST['login'])){
            $user = new User;
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['formData'] = $data;
                redirect();
                
            }
            $user->attributes['password'] = password_hash($user->attributes['password'],PASSWORD_DEFAULT);
            if($user->save('user')){
                $_SESSION['success'] = "Вы успешно создали нового пользователя с login {$_POST['login']} и паролем {$_POST['password']} !";
            }else{
                $_SESSION['error'] = 'Error';
            }
            redirect();
        }  
    }

    public function readUserAction(){
        // debug($_GET['id']);
        $user = \R::findOne('user','id = ?',[$_GET['id']]);
      //  debug($user,1);
        $this->set(compact('user'));
    }

    public function deleteUserAction(){
        $users = \R::findAll('user');
       // debug($users);
        $this->set(compact('users'));
    }

    public function updateUserAction(){
        $users = \R::findAll('user');
       // debug($users);
        $this->set(compact('users'));
    }
}