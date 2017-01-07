<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/3
 * Time: 8:52
 */
class Sakyamuni {
    protected static $_instance;
    private $param=array();
    public static  $buddha_timestamp;


    /**
     * 获取实例
     *
     */
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function __construct(){
        self::$buddha_timestamp=time();



    }
    public function init() {
        // error reporting - all errors for development (ensure you have
        // display_errors = On in your php.ini file)
        error_reporting ( E_ALL | E_STRICT );
        mb_internal_encoding ( 'UTF-8' );

        date_default_timezone_set('Asia/ShangHai');






        if (!defined('TPL_DIR')) define('TPL_DIR', 'front'); //模板路径
        //registe classes
        spl_autoload_register ( array ($this,'loadAutoClass' ) );
        $this->param=Buddha_Run_Router::getInstance()->init(Buddha::getUrlConfig(include PATH_ROOT . 'bootstrap/Buddha/config/config.ini.php'))->makeUrl();

        return $this;
    }
    public function startup(){
        $param = $this->param;
        $controller = $param['controller'] ? $param['controller'] : 'index';
//$getMVC = exec("mvc mvc#{$controller}");
        $getMVC=ucfirst($controller).'Controller';
        $Controller = new $getMVC();
        $action = $param['action'] ? $param['action'] : 'index';
        $Controller->$action();
    }

    public  function  import($classdir){

        $c=preg_replace('/\./','/',$classdir);
        require_once(PATH_ROOT.$c.'.class.php');
        return $this;

    }

    public static function getDatabaseConfig(){
        $databaseconfig=  include PATH_ROOT . 'bootstrap/Buddha/config/config.ini.php';
        return $databaseconfig['database'];
    }
    public static function getSmartyConfig(){
        $databaseconfig= include PATH_ROOT . 'bootstrap/Buddha/config/config.ini.php';
        return $databaseconfig['smarty'];
    }
    public static function getUrlConfig(){
        $databaseconfig=  include PATH_ROOT . 'bootstrap/Buddha/config/config.ini.php';
        return $databaseconfig['url'];
    }
    /**
     * Class loader.
     */
    public function loadAutoClass($class) {

        $_class = strtolower($class);


        if (strpos($_class, 'uddha')){
            $exarr = explode('_',$class);
            require_once PATH_ROOT.'bootstrap/'.implode("/",$exarr).'.class.php';


        }

        if (strpos($_class, 'smarty') !== 0 and strpos($_class, 'phpexcel') !== 0
            and strpos($_class, 'buddha') !== 0
        ) {

            $classes = Buddha_Run_Urils::getClasses(PATH_ROOT);
            if (! array_key_exists ( $class, $classes )) {
                die ( 'Class "' . $class . '" not found.' );
            }
            require_once $classes [$class];

        }



    }
    public function run($obj){
        return $obj;
    }
    public function loadClass($className){

        if (file_exists(PATH_ROOT.'bootstrap/Buddha/'.$className . '/'.$className .'.class.php')) {
            include_once(PATH_ROOT.'bootstrap/Buddha/'.$className . '/'.$className .'.class.php');
            return $this;
        } else {
            exit('no file');
        }
    }

    /**
     * Configures an object with the initial property values.
     * @param object $object the object to be configured
     * @param array $properties the property initial values given in terms of name-value pairs.
     * @return object the object itself
     */
    public static function configure($object, $properties)
    {
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }

        return $object;
    }

}