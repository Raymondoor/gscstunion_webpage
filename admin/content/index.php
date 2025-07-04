<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\return_header;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
UserAuth::admin_gate();
if(!$_SESSION[APP_NAME]['user']['super']){
    return_header('/admin/');
}

pageconfig([
    'TITLE' => 'コンテンツ | 管理 | '.APP_NAME,
    'INDEX' => 'admin-content',
    'ALIAS' => 'コンテンツ'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-content.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <p id="desc">ホームページに表示される様々な内容をここから編集することが出来ます。</p>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');