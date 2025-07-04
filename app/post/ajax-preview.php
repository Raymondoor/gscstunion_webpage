<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Model\Project;
$pj = '';
if(!empty(htmlspecialchars($_POST['project']))){
    $pj = Project::project('id', $_POST['project']);
}
if(empty($pj)){
    $pj = ['directory'=>'','color'=>'#479e88','name'=>'プロジェクト'];
}
@include_once(PUBLIC_DIR.'/asset/style/lib/article.css.php');
?>
<div id="articleContainer" style="border:1px solid #000;">
    <div id="overview">
        <div id="thumb" style="background-image: <?=htmlspecialchars($_POST['thumb'], ENT_QUOTES)?>">
            <a href="#prvdiv" id="refer">←記事一覧へ戻る</a>
            <div id="view">
                <p>0</p><div id="viewImg"></div>
            </div>
        </div>
        <h4 id="project"><a href="#prvdiv" style="color:<?=$pj['color']?>;"><?=$pj['name']?></a></h4>
        <h1 id="title"><?=htmlspecialchars($_POST['title'])?></h1>
        <div id="xtraInfo">
            <div id="text">
                <p id="date"><em><?=htmlspecialchars($_POST['date'])?></em></p>
                <p id="category"><a href="#prvdiv"><?=htmlspecialchars($_POST['cat'])?></a></p>
            </div>
            <button id="clipboardButton" style="background-color:<?=$pj['color']?>;">URLをコピーする</button>
        </div>
        <hr>
    </div>
    <div id="main">
        <div id="prv"><?=$_POST['main']?></div>
    </div>
</div>