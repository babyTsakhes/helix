<?

namespace app\controllers\admin;

use vendor\core\base\View;

class UserController extends AppController{
    public $layout = 'default';
    public function indexAction(){
        View::setMeta('Admin','admin panel','admin page');
        $test = "Testovaya ";
        $data = [
            'test',
            2
        ];
        $this->set([
            'test'=>$test,
            'data'=>$data
        ]);
        echo __METHOD__;
    }

    public function testAction(){
        echo __METHOD__;
    }
}