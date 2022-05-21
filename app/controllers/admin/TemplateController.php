<?

namespace app\controllers\admin;

class TemplateController extends AppController{

    public $layout = 'default';
    public function indexAction(){
        $lays = [
            'admin','burger','default','login','main','proga','test'
        ];
        if(!empty($_POST['temp_code'])){
            $_SESSION['main_temp_code'] = $_POST['temp_code'];
        }
        $this->set(compact('lays'));
    }

    public function classAction(){
        echo "Class";
    }
}