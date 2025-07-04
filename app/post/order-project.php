<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\ProjectController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

if(ProjectController::order($_POST['project'])){
    sethtmlmessage('正常に変更されました！');
    return_header('/admin/success.php');
    exit;
}
sethtmlmessage('エラーが発生しました。');
header('Location: '.referer());
exit;