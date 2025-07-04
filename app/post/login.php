<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\return_header;
use function Raymondoor\Func\sethtmlmessage;

UserAuth::csrf_gate();
$name = $_POST['name'];
$pass = $_POST['password'];
$result = UserAuth::loginSU($name, $pass);
if($result === 0){
    // sethtmlmessage('こんにちは！');
    unset($_SESSION[APP_NAME]['login_try']);
    unset($_SESSION[APP_NAME]['login_over']);
    return_header('/admin/');
}elseif($result === 1){
    sethtmlmessage('ユーザー名が間違っています。');
    return_header('/admin/');
}elseif($result === 2){
    $_SESSION[APP_NAME]['login_try']++;
    sethtmlmessage('パスワードが違います。'.$_SESSION[APP_NAME]['login_try'].'/5 回目。');
    if($_SESSION[APP_NAME]['login_try'] > 5){
        $_SESSION[APP_NAME]['login_over'] = true;
    }
    return_header('/admin/');
}