<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Project;

use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
use function Raymondoor\Func\return_header;

UserAuth::admin_gate();
pageconfig([
    'TITLE' => 'プロジェクト編集 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-project-edit',
    'ALIAS' => 'プロジェクト編集'
]);
if(isset($_GET['id'])):
$pj = Project::project('id', $_GET['id']);
if(empty($pj)):
    return_header('/admin/project/edit.php');
endif;
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-project.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <div id="editpro">
        <ins><?=htmlmessage()?></ins>
        <form action="<?=POST_URL?>edit-project" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" id="new-project-form">
            <div id="textbits">
                <?=csrf_form('newproject')?>
                <label>プロジェクト名：</label>
                <span class="pure-form-message">末尾に"PJ"は入力不要です。（同じ名前は使用出来ません）</span>
                <input type="text" placeholder="例：国際交流" required class="pure-input-1" name="name" id="name" value="<?=$pj['name']?>">
                <label>英語表記：</label>
                <input type="text" placeholder="例：International Exchange" required class="pure-input-1" name="english" value="<?=$pj['english']?>">
                <label>説明：</label>
                <input type="text" placeholder="例：国際交流PJでは..." required class="pure-input-1" name="description" value="<?=$pj['description']?>">
                <label>テーマ色：</label>
                <span class="pure-form-message">背景色などに使用されます。</span>
                <input data-jscolor="{closeButton:true, closeText:'閉じる', backgroundColor:'#ddd', buttonColor:'#000'}" class="pure-input-1-3" name="color" value="<?=trim($pj['color'],'#')?>">
                <label>ディレクトリ名：</label>
                <span class="pure-form-message">変更出来ません。</span>
                <input type="text" placeholder="例：internationalexchange" required class="pure-input-1" name="directory" id="directory" readOnly=""  value="<?=$pj['directory']?>">
            </div>
            <label>表紙画像：</label>
            <label id="imageInput" style="background-image: url(<?=IMAGE_URL?>/main/project/<?=$pj['thumbnail']?>);background-size:cover;">
                <input title="Drop image or click me" type="file" accept="image/*" id="imageInputTr" name="thumbnail">
            </label>
            <input type="hidden" name="id" value="<?=$pj['id']?>">
            <input type="submit" value="更新" class="pure-button pure-button-primary">
            <a href="<?=CURRENT_URL?>" class="pure-button button-warning">前の状態にリセット</a>
        </form>
<?pHp if($_SESSION[APP_NAME]['user']['super']):?>
        <hr>
        <form action="<?=POST_URL?>active-project" method="post" class="pure-form pure-form-stacked">
            <h2 class="admTitle">活動を<?=$pj['active']===1?'停止させる':'再開させる'?></h2>
            <label>パスワード：</label>
            <span class="pure-form-message">活動を停止させると、プロジェクト一覧には表示されなくなり、代わりにアーカイブに移行します。記事はそのまま閲覧可能です。</span>
            <input type="password" placeholder="パスワード" required class="pure-input-1" name="password" id="name">
            <input type="hidden" name="id" value="<?=$pj['id']?>">
            <input type="hidden" name="active" value="<?=$pj['active']?>">
<?php if($pj['active']===1){?>
                <input type="submit" value="停止" class="pure-button button-warning">
<?php }else{?>
                <input type="submit" value="再開" class="pure-button button-secondary">
<?php }?>
        </form>
<?php endif;?>
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
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <div id="projectsList">
<?=$dispPj?>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
endif;