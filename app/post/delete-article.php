<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\ArticleController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$result = ArticleController::delete($_POST['id'], $_POST['password']);
if($result === -2){
    sethtmlmessage('パスワードが違います。');
    header('Location: '.referer());
    exit;
}elseif($result === -1){
    sethtmlmessage('エラーが発生しました。');
    header('Location: '.referer());
    exit;
}elseif($result === 0){
    sethtmlmessage('正常に削除されました。');
    return_header('/admin/success.php');
    exit;
}