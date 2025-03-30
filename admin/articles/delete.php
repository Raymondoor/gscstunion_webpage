<?php $title='記事削除';
$file='ADMIN'.'-'.'ARTICLE-DELETE';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');
require_once(API_DIR.'/validate_admin.php');
session_start();
admin_gate();
include_once(TEMPLATE_DIR.'/header.php');

$article = load_article($_GET['id']);
if($article === false){
    return_header('/admin/articles/');
}
?>
<main>
    <h2>記事削除</h2>
    <p>削除を行うと、Web上からデータが消えます。</p>
    <hr>
    <div id="articleDisp">
        <h3>内容</h3>
        <h4><?=$article['title']?></h4>
        <p><?=sanitize_main($article['main'])?></p>
    </div>
    <hr>
    <div id="delete">
        <h3>完全削除</h3>
<?php if(isset($_SESSION['delarterr'])){ ?>
        <p><?=$_SESSION['delarterr']?></p>
    <?php unset($_SESSION['delarterr']);
}else{ ?>
        <p></p>
<?php } ?>
        <form action="<?=FORM_URL?>/adm-artdel.php" method="post">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <input type="hidden" name="id" value="<?=$article['id']?>">
            <label for="password">パスワード確認</label><br>
            <input type="password" name="password" id="password"><br>
            <input type="submit" value="完全削除">
            <p>※注意：ボタンを押すと、そのまま確認無く削除されます。</p>
        </form>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');