<?php $title='プロジェクト編集';
$file='ADMIN'.'-'.'PROJECT-EDIT';
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
    <h2><?=$project['pName']?>PJ 編集</h2>
    <hr>
    <div id="edit">
        <h3>編集</h3>
<?php if(isset($_SESSION['editproerr'])){ ?>
        <p><?=$_SESSION['editproerr']?></p>
    <?php unset($_SESSION['editproerr']);
}else{ ?>
        <p></p>
<?php } ?>
        <form action="<?=FORM_URL?>/adm-proedt.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <input type="hidden" name="id" value="<?=$project['id']?>">
            <label for="pName">プロジェクト名</label>
            <input type="text" name="pName" id="pName" value="<?=$project['pName']?>"><br>
            <label for="pEngName">英語表記</label>
            <input type="text" name="pEngName" id="pEngName" value="<?=$project['pEngName']?>"><br>
            <label for="pDirName">URL（パス名）*変更不可</label>
            <input type="text" name="pDirName" id="pDirName" readonly value="<?=$project['pDirName']?>"><br>
            <label for="pColour">色</label>
            <input type="color" name="pColour" value="#<?=$project['pColour']?>" id="pColour"><br>
            <label for="pDescription">概要説明</label>
            <input type="text" name="pDescription" id="pDescription" value="<?=$project['pDescription']?>"><br>
            <label for="imgswap">写真を変更する</label>
            <input type="checkbox" name="imgswap" id="imgswap" value="1"><br>
            <label for="pThumbnail">写真（.jpg, .jpeg, .png, .gif 対応。800kb以下、推奨500kb以下）</label>
            <input type="file" name="pThumbnail" accept=".jpg, .jpeg, .png"><br>
            <input type="submit" value="登録">
        </form>
    </div>
    <hr>
    <div id="suspend">
<?php if($project['pIsActive'] == 1){ $subbtn = '停止';?>
        <h3>活動を停止させる</h3>
        <p>活動を停止したプロジェクトは一覧に表示されなくなります。関連記事はそのまま表示されます。</p>
<?php }elseif($project['pIsActive'] == 0){ $subbtn = '再開';?>
        <h3>活動を再開させる</h3>
        <p>活動を再開したプロジェクトは一覧に表示されるようになります。</p>
<?php } ?>
<?php if(isset($_SESSION['susproerr'])){ ?>
        <p><?=$_SESSION['susproerr']?></p>
    <?php unset($_SESSION['susproerr']);
}else{ ?>
        <p></p>
<?php } ?>
        <form action="<?=FORM_URL?>/adm-prosus.php" method="post">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <input type="hidden" name="id" value="<?=$project['id']?>">
            <input type="hidden" name="pIsActive" value="<?=$project['pIsActive']?>">
            <label for="pNameSus">プロジェクト名確認</label><br>
            <input type="text" name="pName" id="pNameSus"><br>
            <label for="password">パスワード確認</label><br>
            <input type="password" name="password" id="password"><br>
            <input type="submit" value="活動を<?=$subbtn?>する">
        </form>
    </div>
    <hr>
    <div id="terminate">
        <h3>削除</h3>
        <p><a href="./delete.php?id=<?=$_GET['id']?>">完全削除はこちらから</a></p>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');