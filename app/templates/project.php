<?php $file='PROJECT';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

$project = load_project('obId');
$title = $project['pName'].' PJ';

include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <div id="dialogue" style="background-color: #<?=$project['pColour']?>;">
        <div id="pThumb" class="dl-box" style="background-image: url(<?=IMAGES_URL.'/main/projects/'.$project['pThumbnail']?>);"></div>
        <div id="text" class="dl-box">
<?php if($project['pIsActive'] == 0){ ?>
            <p>※このプロジェクトは現在活動を停止しています。</p>
<?php } ?>
            <h1><?=$project['pName']?>PJ</h1>
            <h4><i><?=$project['pEngName']?></i></h4>
            <hr>
            <p><?=$project['pDescription']?></p>
        </div>
    </div>
    <hr>
    <div id="articles" style="background-image: url(<?=IMAGES_URL.'/main/projects/'.$project['pThumbnail']?>);">
        <h2>記事</h2>
        <div id="articlesContainer" style="background-color: #<?=$project['pColour']?>;"><hr>
<?=list_articles_project('obId')?>
        </div>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');