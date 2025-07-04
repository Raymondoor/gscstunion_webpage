<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\AboutController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$type = $_POST['type'];
$html = $_POST['main'];
$result = AboutController::update($type, $html);
if($result === -1){
    sethtmlmessage('空白で提出しないでください。');
    header('Location: '.referer());
    exit;
}elseif($result === -2){
    sethtmlmessage('対応していない形式です。');
    header('Location: '.referer());
    exit;
}elseif($result === -3){
    sethtmlmessage('エラーが発せいしました。');
    header('Location: '.referer());
    exit;
}elseif($result === 0){
    sethtmlmessage('正常に更新されました。');
    return_header('/admin/success.php');
    exit;
}