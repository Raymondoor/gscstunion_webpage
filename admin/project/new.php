<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
UserAuth::admin_gate();
pageconfig([
    'TITLE' => 'プロジェクト新規登録 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-project-new',
    'ALIAS' => 'プロジェクト新規登録'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-project.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <div id="newpro">
        <ins><?=htmlmessage()?></ins>
        <form action="<?=POST_URL?>new-project" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" id="new-project-form">
            <div id="textbits">
                <?=csrf_form('newproject')?>
                <label>プロジェクト名：</label>
                <span class="pure-form-message">末尾に"PJ"は入力不要です。（同じ名前は使用出来ません）</span>
                <input type="text" placeholder="例：国際交流" required class="pure-input-1" name="name" id="name">
                <label>英語表記：</label>
                <input type="text" placeholder="例：International Exchange" required class="pure-input-1" name="english">
                <label>説明：</label>
                <input type="text" placeholder="例：国際交流PJでは..." required class="pure-input-1" name="description">
                <label>テーマ色：</label>
                <span class="pure-form-message">背景色などに使用されます。</span>
                <input data-jscolor="{closeButton:true, closeText:'閉じる', backgroundColor:'#ddd', buttonColor:'#000'}" value="479e88" class="pure-input-1-3" name="color">
                <label>ディレクトリ名：</label>
                <span class="pure-form-message">※URLに使用される表記です。特殊文字やスペース等は使用できません。また、他と同じ名前は使用出来ず、後から変更出来ません。</span>
                <input type="text" placeholder="例：internationalexchange" required class="pure-input-1" name="directory" id="directory">
            </div>
            <label>表紙画像：</label>
            <label id="imageInput">
                <input title="Drop image or click me" type="file" accept="image/*" id="imageInputTr" name="thumbnail">
            </label>
            <input type="submit" value="登録" class="pure-button pure-button-primary">
        </form>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');