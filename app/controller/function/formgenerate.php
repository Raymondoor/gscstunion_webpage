<?php namespace Raymondoor\Func;

function csrf_form():string{
    $form = '<input type="hidden" id="csrf" name="csrf_token" value="'.$_SESSION[APP_NAME]['csrf'].'">';
    return $form;
}
function hidden_form(string $name='', string $value=''):string{
    $form = '<input type="hidden" name="'.$name.'" value="'.$value.'">';
    return $form;
}
function htmlmessage():string{
    if(isset($_SESSION[APP_NAME]['htmlmessage'])){
        echo '<p>'.$_SESSION[APP_NAME]['htmlmessage'].'</p>';
    }
    $_SESSION[APP_NAME]['htmlmessage'] = '';
    return '';
}
function sethtmlmessage(string $message){
    $_SESSION[APP_NAME]['htmlmessage'] = $message;
    return true;
}