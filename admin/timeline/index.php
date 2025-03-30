<?php $title='タイムライン管理';
$file='ADMIN'.'-'.'TIMELINE';
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
?>
<main>
    <h2>タイムライン管理</h2>
    <hr>
    <div id="new">
        <h3>追加</h3>
        <form action="<?=FORM_URL?>/adm-timnew.php" method="post">
            <label for="newauthor">投稿者</label><br>
            <input type="text" name="author" id="newauthor"><br>
            <label for="newdate">日付</label><br>
            <input type="text" name="date" id="newdate" value="<?=date('Y-m-d')?>" readonly><br>
            <label for="newmessage">メッセージ</label><br>
            <input type="text" name="message" id="newmessage"><br>
            <input type="submit" value="投稿">
        </form>
    </div>
    <hr>
    <div id="delete">
        <h3>タイムライン編集</h3>
        <p>「削除」を選択したデータがそのまま削除されます。</p>
        <p>新しい順</p>
        <?=list_timeline_edit()?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');