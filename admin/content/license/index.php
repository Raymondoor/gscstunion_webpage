<?php require_once(__DIR__.'/../../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\return_header;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
UserAuth::admin_gate();
if(!$_SESSION[APP_NAME]['user']['super']){
    return_header('/admin/');
}
pageconfig([
    'TITLE' => '規約・ライセンス | 管理 | '.APP_NAME,
    'INDEX' => 'admin-content-license',
    'ALIAS' => '規約・ライセンス'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php
include_once(VIEW_DIR.'/adm-nav.php');
include_once(VIEW_DIR.'/adm-nav-content.php');
include_once(VIEW_DIR.'/adm-nav-content-about.php');?>
<h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
<ins><?=htmlmessage()?></ins>
<form action="<?=POST_URL?>about" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" id="new-article-form">
<input type="hidden" required name="main" id="hiddenMain">
<input type="hidden" required name="type" id="type" value="license">
<div id="quillWrapper"><div id="editor">
    <?php @include_once(DATA_DIR.'/content/license.html');?>
</div></div>
<input type="submit" value="更新" class="pure-button pure-button-primary" id="submitBtn">
<button type="button" onclick="formreset()" class="pure-button button-warning">元に戻す</button>
</form>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
