<?php $title='プロジェクト表示順';
$file='ADMIN'.'-'.'PROJECT-EDIT-ORDER';
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

$projects = load_projects_order();
?>
<main>
    <h2>表示順 編集</h2>
    <hr>
<?php if(isset($_SESSION['editproerr'])){ ?>
        <p><?=$_SESSION['editproerr']?></p>
    <?php unset($_SESSION['editproerr']);
}else{ ?>
        <p></p>
<?php } ?>
    <form action="<?=FORM_URL?>/adm-proord.php" method="post">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <div id="list">
<?php foreach($projects as $project){?>
            <div class="project-row" data-id="<?=$project['id']?>" style="background-color:#<?=$project['pColour']?>">
                <div class="details">
                <h2><a href="<?=PROJECTS_URL.'/'.$project['pDirName']?>"><?=$project['pName']?></a></h2>
                <div class="pImage" style="background-image:url(<?=IMAGES_URL.'/main/projects/'.$project['pThumbnail']?>)"></div>
                </div>
                <div class="navigation">
                <div>順番: <span class="order-display"><?php echo $project['pOrder']; ?></span></div>
                <input type="hidden" name="order[<?=$project['id']?>]" value="<?=$project['pOrder']?>" class="order-input">
                <button type="button" class="move-up">↑</button><br>
                <button type="button" class="move-down">↓</button>
                </div>
            </div>
<?php } ?>
        </div>
        <button type="submit" id="submit">変更を保存する</button>
    </form>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');