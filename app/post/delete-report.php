<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\ReportController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$id = $_POST['id'];

try{
    if(ReportController::delete($id)){
        sethtmlmessage('正常に削除されました！');
        return_header('/admin/success.php');
    }
}catch(Exception $e){
    sethtmlmessage($e->getMessage());
    header('Location: '.referer());
    exit;
}