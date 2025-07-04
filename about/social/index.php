<?php require_once(__DIR__.'/../../vendor/autoload.php');
use function Raymondoor\Func\pageconfig;

pageconfig([
    'TITLE' => 'ソーシャル | '.APP_NAME,
    'INDEX' => 'social',
    'ALIAS' => 'ソーシャル'
]);

include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<div id="content">
<?php
include_once(VIEW_DIR.'/aboutContainer.php');
?>
</div>
<?php include_once(VIEW_DIR.'/foot-nav.php');?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');