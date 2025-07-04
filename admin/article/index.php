<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Article;
use Raymondoor\Model\Display;

use function Raymondoor\Func\dispStrPur;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\referer;
use function Raymondoor\Func\indexIs;
UserAuth::admin_gate();
pageconfig([
    'TITLE' => '記事 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-article',
    'ALIAS' => '記事一覧'
]);

$articles = Display::articles_index();
ob_start();
foreach($articles as $art): ?>
<div class="artContainer" style="background-color: <?=$art['color']?>;">
    <h3 class="pName"><?=dispStrPur($art['title'], 18)?></h3>
    <a href="<?=HOME_URL.'/articles/page/?id='.$art['id']?>"><h3>表示する</h3></a>
</div>
<?php endforeach;
$dispArt = ob_get_clean();
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-article.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <?=$dispArt?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');