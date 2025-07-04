<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Project;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\indexIs;
UserAuth::admin_gate();
pageconfig([
    'TITLE' => 'プロジェクト | 管理 | '.APP_NAME,
    'INDEX' => 'admin-project',
    'ALIAS' => 'プロジェクト一覧'
]);

$projects = Project::trueAll();
ob_start();
foreach($projects as $pj): ?>
<div class="pjContainer" style="background-color:<?=$pj['color']?>;">
    <h3 class="pName"><?=$pj['name']?></h3>
    <a href="<?=HOME_URL.'/projects/?pj='.$pj['directory']?>"><h3>表示する</h3></a>
    <a href="<?=ADMIN_URL.'/project/edit.php?id='.$pj['id']?>"><h3>編集する</h3></a>
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
    <div id="projectsList">
<?=$dispPj?>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');