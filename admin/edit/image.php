<?php $title='写真管理';
$file='ADMIN'.'-'.'EDIT-IMAGE';
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
    <h2>画像編集</h2>
    <form action="<?=FORM_URL.'/adm-sns.php'?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        イニシャル<input type="text" name="new[Tag]" value="" placeholder="例：YT"><br>
        プラットフォーム名<input type="text" name="new[Title]" value="" placeholder="例：YouTube"><br>
        ユーザー名<input type="text" name="new[Username]" value="" placeholder="例：@<?=$SEO['Alias']?>"><br>
        リンク<input type="url" name="new[Link]" value="" placeholder="例：https://youtube.com/@<?=$SEO['Alias']?>"><br>
        画像選択<input type="file" name="newIcon"><br>
        <input type="submit" value="更新" name="newsns">
    </form>
<?php
include_once(TEMPLATE_DIR.'/footer.php');