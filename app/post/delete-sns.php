<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\SnsController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$id = $_POST['id'];
if(SnsController::delete($id)){
    sethtmlmessage('正常に削除されました！');
    return_header('/admin/success.php');
}
sethtmlmessage('エラーが発生しました。');
header('Location: '.referer());
exit;