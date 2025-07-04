<?php namespace Raymondoor\Controller;

use Exception;
use HTMLPurifier;
use HTMLPurifier_Config;

class AboutController{
    public static function update(string $type, $html){
        try{
            $allowedtypes = ['about','policy','license'];
            if(!in_array($type, $allowedtypes)){
                return -2;
            }
            $config = HTMLPurifier_Config::createDefault();
            $config->set('HTML.Allowed', '');
            $purifier = new HTMLPurifier($config);
            $str = $purifier->purify($html);
            if(empty($str)){
                return -1;
            }
            $dir = DATA_DIR.'/content/';
            if(!is_dir($dir)){
                mkdir($dir, 0755, true);
            }
            $file = fopen($dir.$type.'.html', 'w');
            if(fwrite($file, $html)){
                LoggerController::about($type);
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
}