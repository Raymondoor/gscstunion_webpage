<?php namespace Raymondoor\Controller;

use Exception;
use HTMLPurifier;
use HTMLPurifier_Config;
use Raymondoor\Model\Timeline;

class TimelineController{
    public static function new($name, $message){
        try{
            $config = HTMLPurifier_Config::createDefault();
            $config->set('HTML.Allowed', '');
            $purifier = new HTMLPurifier($config);
            $message = $purifier->purify($message);
            $name = $purifier->purify($name);
            $result = Timeline::register($name, $message);
            if($result !== -1){
                LoggerController::timeline($result, 1);
                return true;
            }elseif($result === -1){
                throw new Exception('Not Unique');
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public static function delete($id){
        if(Timeline::delete($id) === 1){
            LoggerController::timeline($id, -1);
            return true;
        }
        return false;
    }
}