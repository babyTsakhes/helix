<?

namespace app\controllers\admin;

use app\models\User;
use fw\core\base\View;

class UserController extends AppController
{
    public $layout = 'default';
    public function indexAction()
    {
        debug($this->route);
        View::setMeta('Admin', 'admin panel', 'admin page');
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

    public function loginAction()
    {
        //     debug($_POST,1);
        if (!empty($_POST)) {
            $user = new User; 
            if (!$user->login(true)) {
                $_SESSION['error'] = 'Логин пароль введены неверно';
            }else if($user->login(true) === "BAN"){
                $_SESSION['error'] = 'Вы забанены.';
            }
            else {
                if (User::isAdmin()) {
                    redirect('/admin/');
                } else {
                    redirect();
                }
            }
        }
        $this->layout = 'login';
    }

    public function testAction()
    {
        echo __METHOD__;
    }

    public function allAction()
    {
        $users = \R::findAll('user');
        //    debug($users[1]->deleted);
        $this->set(compact('users'));
    }

    public function createUserAction()
    {
        if (!empty($_POST['login'])) {
            $user = new User;
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['formData'] = $data;
                redirect();
            }
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if ($user->save('user')) {
                $_SESSION['success'] = "Вы успешно создали нового пользователя с login {$_POST['login']} и паролем {$_POST['password']} !";
            } else {
                $_SESSION['error'] = 'Error';
            }
            redirect();
        }
    }

    public function readUserAction()
    {
        $user = \R::findOne('user', 'id = ?', [$_GET['id']]);
        $this->set(compact('user'));
    }

    public function updateUserAction()
    {
        if (!(empty($_POST['login']))) {
            $user = \R::load('user', $_POST['id']);
            //  debug( $user,1);
            $user->login = $_POST['login'];
            $user->name = $_POST['name'];
            $user->password = (!empty($_POST['password'])) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user->password;
            $user->role = $_POST['role'];
            $user->deleted = $_POST['deleted'];
            $user->comment = $_POST['comment'];
            if (\R::store($user)) {
                $_SESSION['success'] = "Вы успешно изменили пользователя с login {$_POST['login']} !";
            } else {
                $_SESSION['error'] = 'Error';
            }
            redirect();
        } else {
            $user = \R::findOne('user', 'id = ?', [$_GET['id']]);
            $this->set(compact('user'));
        }
    }

    public function deleteUserAction()
    {
        $user = \R::load('user', $_GET['id']);
        if (!(empty($_POST['comment']))) {
            $user->deleted = '1';
            $user->comment = $_POST['comment'];
            if (\R::store($user)) {
                $_SESSION['success'] = "Вы успешно мягко удалили пользователя с login {$user->login} !";
            } else {
                $_SESSION['error'] = 'Error';
            }
            redirect();
        }else{
            $this->set(compact('user'));
        }
       

        //redirect();
    }
}
