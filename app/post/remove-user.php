<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if(UserAuth::userrm($email)){
    sethtmlmessage('「<ins>'.$email.'</ins>」は正常に削除されました。');
    return_header('/admin/success.php');
    exit;
}
sethtmlmessage('エラーが発生しました。');
header('Location: '.referer());
exit;