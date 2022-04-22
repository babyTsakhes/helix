<?
echo "Registry Pattern Project";
$config = [
    'components'=>[
        'cache'=>'vendor\libs\Cache',
        'test'=>'vendor\libs\Test'
    ],
    'settings'=>[

    ]
];

spl_autoload_register(function($class){
    $file = ROOT.'\\'.str_replace("//",'\\',$class).'.php';
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

}