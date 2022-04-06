<?

namespace vendor\core\base;
class View{
    /**
     * текущий маршрут и параметры(controller,action,alias)
     * @var array
     */
    public $route = [];
    /**
     * текущий вид
     * @var string
     */
    public $view;
    /**
     * текущий шаблон
     * @var string
     */
    public $layout;

    public function __construct($route,$layout = '',$view = ''){
        $this->route = $route;
        $this->layout = $layout ?: LAYOUT;
        $this->view = $view;
    }

    public function render(){
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        }else{
            echo "<br>Not found view <b>$file_view</b>";
        }
        $content = ob_get_clean();

        $file_layout = APP."/views/layouts/{$this->layout}.php";
        if(is_file($file_layout))
        {
            require $file_layout;
        }else{
            echo "<br>Not Found layout $file_layout";
        }
    }

}