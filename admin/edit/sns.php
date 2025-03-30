<?php $title='SNSリンク管理';
$file='ADMIN'.'-'.'EDIT-SNS';
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
<?php
if(!empty($_GET['id'])){
    $tag = $_GET['id'];
    if(array_key_exists($tag, $SNS)){?>
    <form action="<?=FORM_URL.'/adm-sns.php'?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        削除する<input type="checkbox" name="<?=$tag?>[Delete]" value="1"><br>
        イニシャル<input type="text" name="<?=$tag?>[Tag]" value="<?=$tag?>"><br>
        プラットフォーム名<input type="text" name="<?=$tag?>[Title]" value="<?=$SNS[$tag]['Title']?>"><br>
        ユーザー名<input type="text" name="<?=$tag?>[Username]" value="<?=$SNS[$tag]['Username']?>"><br>
        リンク<input type="url" name="<?=$tag?>[Link]" value="<?=$SNS[$tag]['Link']?>"><br>
        <input type="hidden" name="<?=$tag?>[Icon]" value="<?=$SNS[$tag]['Icon']?>">
        <img src="<?=IMAGES_URL.'/share/sns/'.$SNS[$tag]['Icon']?>" height="100px"/><br>
        アイコンを変更する<input type="checkbox" name="<?=$tag?>[Swap]" value="1"><br>
        画像選択<input type="file" name="newIcon"><br>
        <input type="hidden" name="oldTag" value="<?=$tag?>">
        <input type="submit" value="更新" name="update">
    </form>
<?php
    }else{
        return_header('/admin/edit/sns.php');
    }
}elseif(empty($_GET['id'])){?>
    <h2>ソーシャルメディアアカウント一覧</h2>
    <?php foreach($SNS as $key => $sns){?>
    <h4><?=$key?></h4>
    <p><?=$sns['Title']?></p>
    <p><?=$sns['Username']?><br>
    <?=$sns['Link']?></p>
    <img src="<?=IMAGES_URL.'/share/sns/'.$sns['Icon']?>" height="100px"/><br>
    <a href="./sns.php?id=<?=$key?>"><input type="submit" value="編集"></a>
    <hr>
<?php }?>
    <h3>新規登録</h3>
    <form action="<?=FORM_URL.'/adm-sns.php'?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        イニシャル<input type="text" name="new[Tag]" value="" placeholder="例：YT"><br>
        プラットフォーム名<input type="text" name="new[Title]" value="" placeholder="例：YouTube"><br>
        ユーザー名<input type="text" name="new[Username]" value="" placeholder="例：@<?=$SEO['Alias']?>"><br>
        リンク<input type="url" name="new[Link]" value="" placeholder="例：https://youtube.com/@<?=$SEO['Alias']?>"><br>
        アイコン（黒）<input type="file" name="newIcon"><br>
        <input type="submit" value="登録" name="newsns">
    </form>
<?php
}

include_once(TEMPLATE_DIR.'/footer.php');