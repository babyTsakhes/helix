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

    public $scripts = [];

    public static $meta = ['title' => '', 'desc'=> '','keywords'=>''];

    public function __construct($route,$layout = '',$view = ''){
        $this->route = $route;
        if($layout === false){
            $this->layout = false;
        }else{
        $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    public function render($vars = []){
        if(is_array($vars)){
          //  debug($vars);
            extract($vars);
        }
         
        $file_view = APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        }else{
            throw new \Exception("<br>Not found view <b>$file_view</b>",404);
        }
        $content = ob_get_clean();

        if($this->layout !== false){
            $file_layout = APP."/views/layouts/{$this->layout}.php";
            if(is_file($file_layout))
            {
                $content = $this->getScripts($content);
                $scripts = [];
                if(!empty($this->scripts[0]))
                   {
                    $scripts = $this->scripts[0];
                   }
                require $file_layout;
            }else{
                throw new \Exception( "<br>Not Found layout $file_layout",404);
            }
        }
    }

    protected function getScripts($content){
        $pattern = "#<script.*?>.*?</script>#si";
        preg_match_all($pattern,$content,$this->scripts);
        if(!empty($this->scripts)){
            $content = preg_replace($pattern,'',$content);
        }
        return $content;
    }

    public static function getMeta(){
        echo '<title>'.self::$meta['title'].'</title>
        <meta name="description" content="' .self::$meta['desc']. '">
        <meta name="keywords" content="' .self::$meta['keywords']. '">';
    }

    public static function setMeta($title = '',$desc='',$keywords=''){
        self::$meta['title'] = $title;
        self::$meta['desc'] = $desc;
        self::$meta['keywords'] = $keywords;
    }

}