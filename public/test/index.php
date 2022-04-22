<?
echo "Registry Pattern Project";
$config = [
    'components'=>[
        'cache'=>'classes\Cache',
        'test'=>'classes\Test'
    ],
    'settings'=>[

    ]
];

spl_autoload_register(function($class){
    $file = str_replace("//",'\\',$class).'.php';
   // $file = APP."/controllers/$class.php";
    if(file_exists($file))
    {
        require_once $file;
    }
} );
class Registry{

    public static $objects = [];

    protected static $instance;

    protected function __construct()
    {
        global $config;
        foreach($config['components'] as $name => $component){
            self::$objects[$name] = new $component;
        }
    }

    public static function instance(){
        if(self::$instance == null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * данный методы - магический, он вызывается при 
     * вызове несуществующего метода
     */
    public function __call($nameOfMethod,$argumentsOfMethod){
        echo '</br>'.$nameOfMethod . " not exists";
        var_dump($argumentsOfMethod);

    }

    public function __get($name){
        if(is_object(self::$objects[$name])){
            return self::$objects[$name];
        }
    }

    public function __set($name,$value){

    }

    public function getList(){
        echo '<pre>';
        var_dump(self::$objects);
        echo '</pre>';
    }

}

$app = Registry::instance();

//$app->getList();
$app->test->go();