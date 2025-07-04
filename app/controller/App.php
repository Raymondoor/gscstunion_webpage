<?php require_once(__DIR__.'/../../vendor/autoload.php');

class App{
    public static $PAGE = [
        'TITLE' => APP_NAME,
        'INDEX' => 'index',
        'ALIAS' => 'Index'
    ];
    public static function set(array $val):array{
        self::$PAGE =  array_merge(self::$PAGE, $val);
        return self::$PAGE;
    }
    public static function get(string $key){
        return self::$PAGE[$key];
    }
    public static function csrf(){
        if(!isset($_SESSION[APP_NAME]['csrf'])){
            $_SESSION[APP_NAME]['csrf'] = bin2hex(random_bytes(32));
            return;
        }
    }
}