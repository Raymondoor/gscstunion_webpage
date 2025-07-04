<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Model\Article;
use Raymondoor\Model\Display;
use Raymondoor\Model\Project;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\return_header;

if(isset($_GET['id'])):
$id = filter_input(INPUT_GET,'id', FILTER_VALIDATE_INT);
if(empty($id)){
    return_header('/articles/');
}
$art = Article::article('id', $id);
if(empty($art)){
    return_header('/articles/');
}
Article::addview($art['id']);
$pj = Project::project('id', $art['project_id']);
pageconfig([
    'TITLE' => $art['title'].' | '.$art['name'].' PJ | '.APP_NAME,
    'INDEX' => 'article',
    'ALIAS' => '記事'
]);

include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<div id="mainBg" style="background-image: url(<?=IMAGE_URL.'/main/project/'.$pj['thumbnail']?>);">
<?php include_once(VIEW_DIR.'/article.php');?>
</div>
<?php include_once(VIEW_DIR.'/foot-nav.php');?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
else:
    return_header('/articles/');
endif;