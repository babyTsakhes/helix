<?

namespace app\controllers\admin;

use app\controllers\AppController as ControllersAppController;
use app\models\User;
use fw\core\App;
use fw\core\base\Controller;
use fw\widgets\language\Language;

class AppController extends Controller{
    public $layout = 'admin';

    public function __construct($route){
        parent::__construct($route);
        new ControllersAppController($route);
        App::$app->setProperty('langs',ControllersAppController::$langs);
        App::$app->setProperty('lang',Language::getLanguage(App::$app->getProperty('langs')));
        //unset($_SESSION);
        if( !User::isAdmin() && $route['action'] != 'login'){
           redirect(ADMIN . '/user/login');
        }
    }
}