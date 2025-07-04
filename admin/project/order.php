<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Project;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
UserAuth::admin_gate();
pageconfig([
    'TITLE' => 'プロジェクト表示順 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-project-order',
    'ALIAS' => 'プロジェクト表示順'
]);
$projects = Project::trueAll();
ob_start();
foreach($projects as $pj): ?>
<div class="pjContainer" tabindex="0" style="background-color:<?=$pj['color']?>;">
    <h3 class="pName"><?=$pj['name']?></h3>
    <div class="other">
        <p class="orderdisp"><strong>1</strong></p>
        <div class="handler" style="background-image:url(<?=IMAGE_URL.'/share/grab.svg'?>);"></div>
        <input type="hidden" name="project[<?=$pj['id']?>]" value="">
    </div>
</div>
<?php endforeach;
$dispPj = ob_get_clean();
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-project.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <?=htmlmessage()?>
    <div id="message">
        <p>右の数字横にある箇所をドラッグ&ドロップして変更してください。変更が完了したら、下の登録ボタンより確定させてください。</p>
    </div>
    <form action="<?=POST_URL?>order-project" method="post" class="pure-form pure-form-stacked" id="orderform">
        <div id="sorter">
<?=$dispPj?>
        </div>
        <input type="submit" value="登録" class="pure-button pure-button-primary">
    </form>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');