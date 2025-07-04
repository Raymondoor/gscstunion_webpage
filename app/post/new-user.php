<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$domain = '@gs.gsc.aoyama.ac.jp';
if(substr($email, -strlen($domain)) !== $domain){
    sethtmlmessage('適切なドメインではありません。');
    header('Location: '.referer());
    exit;
}
if(UserAuth::useradd($email)){
    sethtmlmessage('正常に登録されました！');
    return_header('/admin/success.php');
    exit;
}