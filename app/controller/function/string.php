<?php namespace Raymondoor\Func;
require_once(__DIR__.'/../../../vendor/autoload.php');

use HTMLPurifier;
use HTMLPurifier_Config;

function dispStrPur(string $str, int $length=0){
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.Allowed', '');
    $purifier = new HTMLPurifier($config);
    $str = $purifier->purify($str);
    if(function_exists('mb_substr') && function_exists('mb_strlen')){
        if($length === 0){
            $length = mb_strlen($str,'UTF-8');
        }
        return mb_substr($str,0,$length,'UTF-8').(mb_strlen($str,'UTF-8')>$length?'...':'');
    }else{
        if($length === 0){
            $length = strlen($str,'UTF-8');
        }
        return substr($str,0,$length,'UTF-8').(strlen($str,'UTF-8')>$length?'...':'');
    }
}
function clean_str($str) {
    // Remove unwanted characters (keep letters, numbers, underscores, dots, hyphens)
    $str = preg_replace('/[^\w\.-]+/', '-', $str);
    // Replace multiple hyphens or dots with a single one
    $str = preg_replace('/[-.]+/', '-', $str);
    // Trim hyphens from beginning and end
    $str = trim($str, '-');
    return $str;
}