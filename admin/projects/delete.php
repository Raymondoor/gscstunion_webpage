<?php $title='プロジェクト削除';
$file='ADMIN'.'-'.'PROJECT-DELETE';
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

$project = load_project($_GET['id']);
if($project === false){
    return_header('/admin/projects/');
}
?>
<main>
    <h2><?=$project['pName']?>PJ 削除</h2>
    <p>完全削除を行うと、Web上から全てのデータが消えます。また、関連記事も削除されます。万一、残したいデータがある場合は「活動停止」状態にすることをお勧めします。</p>
    <hr>
    <div id="delete">
        <h3>完全削除</h3>
<?php if(isset($_SESSION['delproerr'])){ ?>
        <p><?=$_SESSION['delproerr']?></p>
    <?php unset($_SESSION['delproerr']);
}else{ ?>
        <p></p>
<?php } ?>
        <form action="<?=FORM_URL?>/adm-prodel.php" method="post">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <input type="hidden" name="id" value="<?=$project['id']?>">
            <label for="pNameDel">プロジェクト名確認</label><br>
            <input type="text" name="pName" id="pNameDel"><br>
            <label for="password">パスワード確認</label><br>
            <input type="password" name="password" id="password"><br>
            <input type="submit" value="完全削除">
            <p>※注意：ボタンを押すと、そのまま確認無く削除されます。</p>
        </form>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');