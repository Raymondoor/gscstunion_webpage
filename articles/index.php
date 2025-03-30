<?php $title='記事';
$file='ARTICLES';
$root='../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <div id="article-table">
    <h1>記事一面</h1>
<?=list_articles_index()?>
    </div>
    <div id="all-Articles">
<!--<?=list_articles_index_all()?>-->
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');