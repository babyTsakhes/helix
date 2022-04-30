<?

namespace fw\core;

class Registry
{
    use TSingletone;

    public static $objects = [];

    protected static $instance;

    protected function __construct()
    {
        require '../config/config.php';
        foreach ($config['components'] as $name => $component) {
            /*    echo $component;
        echo $name; */
            self::$objects[$name] = new $component;
        }
    }

    /* public static function instance(){
    if(self::$instance == null){
        self::$instance = new self;
    }
  //  var_dump(self::$instance->getList());
    return self::$instance;
} */

    /**
     * данный методы - магический, он вызывается при 
     * вызове несуществующего метода
     */
    public function __call($nameOfMethod, $argumentsOfMethod)
    {
        echo '</br>' . $nameOfMethod . " not exists";
        var_dump($argumentsOfMethod);
    }
    public function getList()
    {
        echo '<pre>';
        var_dump(self::$objects);
        echo '</pre>';
    }

    public function __get($name)
    {
        if (is_object(self::$objects[$name])) {
            return self::$objects[$name];
        }
    }

    public function __set($name, $object)
    {
        if (!isset(self::$objects[$name])) {
            self::$objects[$name] = new $object;
        }
    }
}
