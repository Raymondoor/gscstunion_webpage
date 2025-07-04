<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\ReportController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$year = $_POST['year'];
$type = $_POST['type'];
$title = $_POST['title'];
$link = $_POST['link'];
foreach($_POST as $post){
    if(empty($post)){
        sethtmlmessage('全ての欄を埋めてください。');
        header('Location: '.referer());
        exit;
    }
}
try{
    if(ReportController::new($year, $type, $title, $link)){
        sethtmlmessage('正常に登録されました！<br><a href="'.ADMIN_URL.'/content/report/">更に追加する</a>');
        return_header('/admin/success.php');
    }
}catch(Exception $e){
    sethtmlmessage($e->getMessage());
    header('Location: '.referer());
    exit;
}