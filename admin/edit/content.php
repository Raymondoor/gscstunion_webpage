<?php $title='概要編集';
$file='ADMIN'.'-'.'EDIT-CONTENT';
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
    <h2>概要編集</h2>
<?php
$content = load_content();
if(empty($_GET['content'])){?>
    <ul><?php
    foreach($content as $key => $value){?>
        <li><a href="./content.php?content=<?=$key?>"><?=$key?></a></li>
    <?php }?>
    </ul>
<?php 
}elseif(array_key_exists($_GET['content'], $content)){$details = $_GET['content'];?>
    <form action="<?=FORM_URL?>/adm-content.php" method="post">
    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
    <input type="hidden" name="content" value="<?=$details?>">
    <textarea rows="50" name="<?=$details?>"><?=$content[$details]?></textarea><br>
    <input type="submit" value="更新">
    </form><?php
    
}else{
    return_header('/admin/edit/content.php');
}
?>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');