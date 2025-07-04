<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\TimelineController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$name = $_POST['author'];
$message = $_POST['message'];
if(TimelineController::new($name, $message)){
    sethtmlmessage('正常に投稿されました！');
    return_header('/admin/success.php');
}
sethtmlmessage('エラーが発生しました。');
header('Location: '.referer());
exit;