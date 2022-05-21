<?

namespace app\controllers\admin;

use fw\core\base\Lang;

class LangController extends AppController{

    public $layout = 'default';

    public function allAction(){
        $lang_code = "ru";
        if(!empty($_POST['lang_code'])){
            $lang_code = $_POST['lang_code'];
        }
        
        $lang_layout = APP . "/langs/$lang_code.php";
        $words = include $lang_layout;
        $this->set(compact('words'));
    }

    public function changeWordAction(){
        $lang_layout = APP . "/langs/en.php";
        $words = [];
        require_once $lang_layout;
        foreach($_POST as $k => $w)
        {
            $words[$k] = $w;
        }
        $arrayFile = "<?php\r\n\r\n"
          ."return " . var_export($words, TRUE) . ";"
          ."\r\n?>";

          file_put_contents( $lang_layout, $arrayFile);
        redirect();
    }
}