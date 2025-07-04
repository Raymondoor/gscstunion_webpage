<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\ProjectController;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$id = $_POST['id'];
$name = trim($_POST['name']);
$english = trim($_POST['english']);
$description = trim($_POST['description']);
$color = trim($_POST['color']);

if($_FILES['thumbnail']['error'] !== 0 && $_FILES['thumbnail']['error'] !== 4){
    sethtmlmessage('画像処理にエラーが発生しました。');
    header('Location: '.referer());
    exit;
}elseif($_FILES['thumbnail']['size'] > 819200){
    sethtmlmessage('画像サイズが大きすぎます！（800kb以下）');
    header('Location: '.referer());
    exit;
}
$thumbfile = $_FILES['thumbnail'];
if(ProjectController::update($id, $name, $english, $description, $color, $thumbfile)){
    sethtmlmessage('正常に更新されました！');
    return_header('/admin/success.php');
}