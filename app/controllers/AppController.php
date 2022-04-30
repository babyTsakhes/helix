<?
namespace app\controllers;
use fw\core\base\Controller;
class AppController extends Controller{

    public $menu;
    public $meta = [];

    public function __construct($route){
        parent::__construct($route);
        new \app\models\Main;
        $this->menu = \R::findAll('category');
        if($this->route['action'] == 'test')
        {
          //  echo '<h1>TEST</h1>';
        }
    }

    public function test(){
        echo __METHOD__;
    }

    protected function setMeta($title = '',$desc = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}