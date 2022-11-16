<?php
/**
 *
 */
namespace Index_Space;
use System\Internal\Core\Bootstrap;

class Index {

    public function __construct() {
        define ('FOLDER', dirname(__FILE__).'/');
        define ('SITE', $_SERVER['SERVER_NAME'].'/');
        define ('TITLE', 'MariaCRM');
    }

    private function debug($trigger = 'OFF'){
        if ($trigger == 'ON') {
            ini_set('display_errors', 1);
        } else {
            ini_set('display_errors', 0);
        }

    }

    public function getStart() {
        self::debug('ON');
    }

    public function bootstrap(){
        $bootstrap = new Bootstrap();
        $bootstrap->index();
    }

    public static function autoloader($class)
    {
        $parts = explode('\\', $class);
        $namespace_1 = strtolower($parts[0]);
        $namespace_2 = strtolower($parts[1]);
        $namespace_3 = strtolower($parts[2]);
        $class_file = strtolower($parts[3].".php");
        $class_incliude = FOLDER.$namespace_1.'/'.$namespace_2.'/'.$namespace_3.'/'.$class_file;
        if ( file_exists( $class_incliude ) ) {
            require_once $class_incliude;
        }
    }

    public function __destruct()
    {

    }
}
$index = new Index();
$index->getStart();
spl_autoload_register(__NAMESPACE__ .'\Index::autoloader');
$index->bootstrap();
