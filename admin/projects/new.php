<?php $title='プロジェクト登録';
$file='ADMIN'.'-'.'PROJECT-NEW';
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
    <h2>プロジェクト登録</h2><hr>
<?php
if(isset($_SESSION['newproerr'])){ ?>
    <p><?=$_SESSION['newproerr']?></p>
    <?php unset($_SESSION['newproerr']);
}else{ ?>
    <p></p>
<?php }?>
    <form action="<?=FORM_URL?>/adm-pronew.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <label for="">プロジェクト名</label>
        <input type="text" name="pName" id="pName"><br>
        <label for="">英語表記</label>
        <input type="text" name="pEngName" id="pEngName"><br>
        <label for="">URL（パス名）</label>
        <input type="text" name="pDirName" id="pDirName"><br>
        <label for="">色</label>
        <input type="color" name="pColour" value="#479e88" id="pColour"><br>
        <label for="">概要説明</label>
        <input type="text" name="pDescription" id="pDescription"><br>
        <label for="">写真（.jpg, .jpeg, .png, .gif 対応。800kb以下、推奨500kb以下）</label><br>
        <input type="file" name="pThumbnail" accept=".jpg, .jpeg, .png, .gif" id="thumb"><br>
        <img id="preview"><br>
        <input type="submit" value="登録">
    </form>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');