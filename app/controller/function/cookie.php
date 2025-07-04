<?php namespace Raymondoor\Func;

use const Raymondoor\Config\HOME_PATH;

function app_setcookie(string $name, string $value='', int $expire=60*60, string $path='', bool $return=false){
    // all cookie will be inside the application scope, so no worry of interfering with others
    $name = APP_NAME.'['.$name.']';
    // by default, the path will be the HOME_PATH
    $path = empty(HOME_PATH) ? '/'.$path : HOME_PATH.$path;
    // default is 1 hour, no need to add time()
    $expire = time()+$expire;
    if(setcookie($name, $value, $expire, $path)){
        // you can either retrieve the data back or just let it end;
        if($return){
            return array($name, $value, $expire, $path);
        }else{
            return true;
        }
    }
    return false;
}
function app_removecookie(string $name, int $expire=0, string $path=''){
    $name = APP_NAME.'['.$name.']';
    $path = empty(HOME_PATH) ? '/'.$path : HOME_PATH.$path;
    $expire = $expire;
    return setcookie($name, '', $expire, $path);
}