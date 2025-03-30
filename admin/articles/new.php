<?php $title='記事登録';
$file='ADMIN'.'-'.'ARTICLE-NEW';
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
    <h2>記事追加</h2><hr>
<?php
if(isset($_SESSION['newarterr'])){ ?>
    <p><?=$_SESSION['newarterr']?></p>
    <?php unset($_SESSION['newarterr']);
}else{ ?>
    <p></p>
<?php }?>
    <form action="<?=FORM_URL?>/adm-artnew.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <label for="">プロジェクト</label><br>
        <select name="projectid" id="projectid" title="プロジェクト">
            <option value="">--（必須）</option>
<?php $propt = load_projects();
foreach($propt as $option){ ?>
            <option value="<?=$option['id']?>"><?=$option['pName']?></option>
<?php }?>
        </select><br>
        <label for="">タイトル</label><br>
        <input type="text" name="title" id="title"><br>
        <label for="date">日付</label><br>
        <input type="text" name="date" id="date" value="<?=date('Y-m-d')?>" readonly><br>
        <label for="">カテゴリ</label><br>
        <select name="hid" id="hid" title="カテゴリ">
            <option value="">--（必須）</option>
<?php $hopt = load_hashtags();
foreach($hopt as $option){ ?>
            <option value="<?=$option['id']?>">#<?=$option['hName']?></option>
<?php }?>
        </select><br>
        <label>検索＆新しいカテゴリを追加</label><br>
        <input type="text" id="newhash" name="newhash"><p id="match"></p>
        <label for="">表紙写真（.jpg, .jpeg, .png 対応。800kb以下、推奨500kb以下）</label><br>
        <input type="file" name="thumbnail" accept=".jpg, .jpeg, .png"><br>
        <label for="editor">本文</label>
        <div id="editor"></div>
        <input type="hidden" id="editorInput" name="main"><br>
        <input type="submit" value="投稿" id="sumitbtn">
    </form>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');