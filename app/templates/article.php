<?php $file='ARTICLE';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

$article = load_article('obID');
$project = load_project($article['projectid']);
$hashtag = load_hashtag($article['hashtagid']);
$title = $article['title'];

include_once(TEMPLATE_DIR.'/header.php');
?>
<main style="background-image: url(<?=IMAGES_URL.'/main/projects/'.$project['pThumbnail']?>);">
<div id="colourfilter" style="background-color: #<?=$project['pColour']?>C0;">
<?php include_once(TEMPLATE_DIR.'/page.php'); ?>
</div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');