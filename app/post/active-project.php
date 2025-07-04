<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\ProjectController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$id = $_POST['id'];
$state = $_POST['active']==='1'?0:1;
$password = $_POST['password'];
$msg = $_POST['active']==='1'?'停止':'再開';
if(ProjectController::activate($id, $state, $password)){
    sethtmlmessage('正常に'.$msg.'されました！');
    return_header('/admin/success.php');
}
sethtmlmessage('エラーが発生しました。');
header('Location: '.referer());
exit;