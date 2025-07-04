<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\ArticleController;
use Raymondoor\Model\Category;

use function Raymondoor\Func\referer;
use function Raymondoor\Func\sethtmlmessage;
use function Raymondoor\Func\return_header;

$title = trim($_POST['title']);
$projectID = $_POST['project'];
$date = trim($_POST['date']);
$categoryID = !empty($_POST['category']) ? $_POST['category'] : null;
$category = !empty($_POST['newcategory']) ? $_POST['newcategory'] : null;
$main = $_POST['main'];
if(empty($title) || empty($projectID) || empty($date) || empty($title) || empty($main)){
    sethtmlmessage('全ての欄を埋めてください。');
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
if(is_null($category) && is_null($categoryID)){
    sethtmlmessage('カテゴリを選択または追加してください。');
    header('Location: '.referer());
    exit;
}
if(!is_null($category) && is_null($categoryID)){
    $categoryID = Category::register($category);
}
if(ArticleController::new($title, $date, $main, $thumbfile, $projectID, $categoryID)){
    sethtmlmessage('正常に作成されました！');
    return_header('/admin/success.php');
}