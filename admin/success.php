<?php require_once(__DIR__.'/../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\pageconfig;

UserAuth::admin_gate();
pageconfig([
    'TITLE'=>'成功！',
    'INDEX'=>'admin-success',
    'ALIAS'=>'成功！'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
    <h3 class="admTitle"><?=htmlmessage()?></h3>
    <h3 style="text-align:center;"><a href="<?=HOME_URL?>/admin/" style="color:cadetblue">管理トップに戻る</a></h3>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');