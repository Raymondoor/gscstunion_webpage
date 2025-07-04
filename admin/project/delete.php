<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Project;

use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
use function Raymondoor\Func\return_header;

UserAuth::admin_gate();
if(!$_SESSION[APP_NAME]['user']['super']){
    return_header('/admin/project/');
}
pageconfig([
    'TITLE' => 'プロジェクト削除 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-project-delete',
    'ALIAS' => 'プロジェクト削除'
]);
if(isset($_GET['id'])):
$pj = Project::project('id', $_GET['id']);
if(empty($pj)):
    return_header('/admin/project/delete.php');
endif;
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-project.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <p id="desc"><ins>プロジェクトを削除した場合、そのプロジェクトの下に作成された関連記事も同様に削除されます。</ins>通常の場合、「<strong>活動停止</strong>」を行ってください。</p>
    <div id="newpro">
        <ins><?=htmlmessage()?></ins>
        <div id="projectContainer">
            <div id="overview" style="background-color:<?=$pj['color']?>;">
                <h2><?=$pj['name']?></h2>
                <h4><em><?=$pj['english']?></em></h4>
                <hr>
                <p><?=$pj['description']?></p>
            </div>
        </div>
        <form action="<?=POST_URL?>delete-project" method="post" class="pure-form pure-form-stacked" id="new-project-form">
            <div id="textbits">
                <?=csrf_form('newproject')?>
                <label>パスワード：</label>
                <span class="pure-form-message">本当に削除する場合は、以下に管理者パスワードを入力して削除ボタンを押してください。※そのまま確認無く削除されます。</span>
                <input type="password" placeholder="パスワード" required class="pure-input-1" name="password" id="name">
                <input type="hidden" name="id" value="<?=$pj['id']?>">
            <input type="submit" value="削除" class="pure-button button-error">
        </form>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');

else:
$projects = Project::trueAll();
ob_start();
foreach($projects as $pj): ?>
<div class="pjContainer" style="background-color:<?=$pj['color']?>;">
    <a href="<?=CURRENT_URL.'?id='.$pj['id']?>">
        <h3><?=$pj['name']?></h3>
    </a>
</div>
<?php endforeach;
$dispPj = ob_get_clean();
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-project.php');?>
    <h2 class="admTitle"><?=App::get('ALIAS')?></h2>
    <ins><?=htmlmessage()?></ins>
    <div id="projectsList">
<?=$dispPj?>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
endif;