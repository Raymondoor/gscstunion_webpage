<?php require_once(__DIR__.'/../vendor/autoload.php');
use Raymondoor\Model\Display;
use function Raymondoor\Func\difftoday;
use function Raymondoor\Func\dispStrPur;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\jpformatWest;
$latestArticles = Display::articles_index(6);
$grid = 0;
pageconfig([
    'TITLE' => '最新記事 | '.APP_NAME,
    'INDEX' => 'articles',
    'ALIAS' => '最新記事'
]);

include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
    <div id="latest">
        <p id="scroll">スクロール<br>↓</p>
        <h1 id="ltitle">最新記事</h1>
<?php foreach($latestArticles as $lart){ $grid++;?>
        <a class="lart grid<?=$grid?>" href="<?=HOME_URL.'/articles/page/?id='.$lart['id']?>">
            <div class="lcolor" style="background-color: <?=$lart['color']?>;"></div>
            <div class="lbgimg" style="background-image: url(<?=IMAGE_URL.'/main/article/'.$lart['thumbnail']?>);"></div>
            <div class="ltext" style="background-color: <?=$lart['color']?>;">
                <h2><?=dispStrPur($lart['title'], 28)?></h2>
                <h4><?=$lart['name']?> PJ</h4>
                <p><em><?=jpformatWest($lart['date'])?></em></p>
            </div>
    <?php if(difftoday($lart['date']) <=14){?>
            <div class="lnew"></div>
            <h3 class="lnewtxt">新着！</h3>
    <?php }?>
        </a>
<?php }?>
    </div>
    <hr>
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
<?php
$articles = Display::articles_index(10, 6);
foreach($articles as $pj){?>
<div class="artContainer swiper-slide" style="background-color:<?=$pj['color']?>;">
    <div class="thumbBg" style="background-image: url(<?=IMAGE_URL.'/main/article/'.$pj['thumbnail']?>);">
        <a class="overview" href="<?=HOME_URL.'/articles/page/?id='.$pj['id']?>" style="background:<?=$pj['color']?>ee;background:linear-gradient(0deg,<?=$pj['color']?>ff 0%,<?=$pj['color']?>cc 100%);">
            <h2><?=dispStrPur($pj['title'], 28)?></h2>
            <h4><?=$pj['name']?> PJ</h4>
            <p><em><?=jpformatWest($pj['date'])?></em></p>
            <p>#<?=$pj['category']?></p>
            <a class="detailA" href="<?=HOME_URL.'/articles/page/?id='.$pj['id']?>"><p class="detailP">詳しく見る</p></a>
        </a>
    </div>
</div>
<?php };?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-scrollbar"></div>
    </div>
    <hr>
    <div id="searchlink">
        <a href="<?=CURRENT_URL?>list/">記事一覧はこちらから</a>
    </div>
<?php include_once(VIEW_DIR.'/foot-nav.php');?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');