<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\SnsController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$name = $_POST['name'];
$username = $_POST['username'];
$link = $_POST['link'];
foreach($_POST as $post){
    if(empty($post)){
        sethtmlmessage('全ての欄を埋めてください。');
        header('Location: '.referer());
        exit;
    }
}
if($_FILES['icon']['error'] === 4){
    sethtmlmessage('表紙画像がアップロードされていません。');
    header('Location: '.referer());
    exit;
}
if($_FILES['icon']['error'] !== 0){
    sethtmlmessage('画像処理にエラーが発生しました。');
    header('Location: '.referer());
    exit;
}
$iconfile = $_FILES['icon'];
try{
    if(SnsController::new($name, $username, $link, $iconfile)){
        sethtmlmessage('正常に登録されました！');
        return_header('/admin/success.php');
    }
}catch(Exception $e){
    sethtmlmessage($e->getMessage());
    header('Location: '.referer());
    exit;
}