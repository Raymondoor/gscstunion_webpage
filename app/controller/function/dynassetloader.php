<?php namespace Raymondoor\Func;

function loadAsset(string $type){
    $name = basename(\App::get('INDEX'));
    $htmlcss = '<link rel="stylesheet" href="'.STYLE_URL.'/lib/'.$name.'.css" />';
    $htmljs = '<script src="'.SCRIPT_URL.'/lib/'.$name.'.js" /></script>';
    if($type == 'style'){
        @include_once(PUBLIC_DIR.'/asset/style/lib/'.$name.'.css.php');
        echo $htmlcss;
        return;
    }elseif($type == 'script'){
        @include_once(PUBLIC_DIR.'/asset/script/lib/'.$name.'.js.php');
        echo $htmljs;
        return;
    }else{
        return;
    }
}