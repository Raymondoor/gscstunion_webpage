<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');


session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){?>
<style>@import url("<?=STYLE_URL?>/lib/ARTICLE.css");</style>
<div id="articleContainer">
    <div class="thumbnail" style="background-image: url(<?=$_POST['thumb']?>)"></div>
    <div id="textContainer">
        <h4 id="project"><a style="color:#111;text-decoration:underline;cursor:pointer"><?=$_POST['project']?></a></h4>
        <h1 id="title" style="font-size: 2rem;"><?=htmlspecialchars($_POST['title'])?></h1>
        <div id="info">
            <div id="actualinfo">
                <p id="date"><i><?=$_POST['date']?></i></p>
                <p><?=$_POST['cat']?></p>
            </div>
            <button id="clipboardButton">URLをコピーする</button>
        </div>
        <hr>
        <div id="content"><?=$_POST['main']?></div>
    </div>
</div>
<?php }