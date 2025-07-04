<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\ProjectController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$name = trim($_POST['name']);
$english = trim($_POST['english']);
$description = trim($_POST['description']);
$color = trim($_POST['color']);
$directory = trim($_POST['directory']);
foreach($_POST as $post){
    if(empty($post)){
        sethtmlmessage('全ての欄を埋めてください。');
        header('Location: '.referer());
        exit;
    }
}
if(!preg_match('/^[a-zA-Z0-9_.-]+$/', $directory)){
    sethtmlmessage('ディレクトリ名が適切ではありません。');
    header('Location: '.referer());
    exit;
}
if($_FILES['thumbnail']['error'] === 4){
    sethtmlmessage('表紙画像がアップロードされていません。');
    header('Location: '.referer());
    exit;
}
if($_FILES['thumbnail']['error'] !== 0){
    sethtmlmessage('画像処理にエラーが発生しました。');
    header('Location: '.referer());
    exit;
}elseif($_FILES['thumbnail']['size'] > 819200){
    sethtmlmessage('画像サイズが大きすぎます！（800kb以下）');
    header('Location: '.referer());
    exit;
}
$thumbfile = $_FILES['thumbnail'];
if(ProjectController::new($name, $english, $description, $color, $directory, $thumbfile)){
    sethtmlmessage('正常に作成されました！');
    return_header('/admin/success.php');
}