<?php namespace Raymondoor\Func;

function return_header(string $uri='/', $fullrefresh = false){
    if($fullrefresh){
        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
        header("Pragma: no-cache"); // HTTP 1.0
        header("Expires: 0"); // Proxies
    }
    header("Location: ".HOME_URL.$uri);
    exit;
}
function indexIs(... $args):bool{
    foreach($args as $arg){
        if(\App::get('INDEX') === $arg){
            return true;
        }
    }
    return false;
}
function indexAre(... $args):bool{
    foreach($args as $arg){
        if(strpos(\App::get('INDEX'), $arg) === 0){
            return true;
        }
    }
    return false;
}
function referer(){
    if(isset($_SERVER['HTTP_REFERER'])){
        return $_SERVER['HTTP_REFERER'];
    }else{
        return HOME_URL.'/';
    }
}