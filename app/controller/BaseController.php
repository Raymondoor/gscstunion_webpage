<?php namespace Raymondoor\Controller;

use Exception;
use HTMLPurifier;
use HTMLPurifier_Config;

class BaseController{
    private static $data = [
        'Organization' => '',
        'Alias' => '',
        'School' => '',
        'Faculty' => '',
        'Keywords' => '',
        'FoundDate' => [
            'Year' => '',
            'Month' => '',
            'Day' => '',
        ],
        'Location' => [
            'Building' => '',
            'Street' => '',
            'City' => '',
            'Prefecture' => '',
            'Country' => '',
            'Country-Code' => '',
            'Post' => '',
        ],
        'Members' => '',
        'Description' => '',
        'Google-SEO' => '',
        'Bing-SEO' => ''
    ];
    private static function make(){
        $dir = DATA_DIR.'/json/';
        if(!is_dir($dir)){
            mkdir($dir, 0755, true);
        }
        $filepath = DATA_DIR.'/json/base.json';
        if(!file_exists($filepath)){
            $file = fopen($filepath, 'w');
            $json = json_encode(self::$data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            fwrite($file, $json);
            fclose($file);
            return 0;
        }
        return 0;
    }
    public static function update(array $data){
        try{
            self::make();
            $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            $dir = DATA_DIR.'/json/';
            if(!is_dir($dir)){
                mkdir($dir, 0755, true);
            }
            $file = fopen($dir.'base.json', 'w');
            if(fwrite($file, $json)){
                LoggerController::base();
            }else{
                fclose($file);
                return -3;
            }
            fclose($file);
            return 0;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public static function get(){
        self::make();
        $BASE = file_get_contents(DATA_DIR.'/json/base.json');
        return json_decode($BASE, true);
    }
}