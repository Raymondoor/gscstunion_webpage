<?php require_once(__DIR__.'/../vendor/autoload.php');
use Raymondoor\Model\Project;
use function Raymondoor\Func\dispStrPur;
use function Raymondoor\Func\pageconfig;
$projects = Project::allarchive();
pageconfig([
    'TITLE'=>'アーカイブ | '.APP_NAME,
    'INDEX'=>'archive',
    'ALIAS'=>'アーカイブ'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
    <h1 class="subHeading"><?=\App::get('ALIAS')?></h1>
    <hr>
    <div id="projects">
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mainSwiper">
            <div class="swiper-wrapper">
<?php foreach($projects as $pj){?>
                <div class="swiper-slide" style="background-color:<?=$pj['color']?>;">
                    <div class="mainThumb" style="background-image:url(<?=IMAGE_URL.'/main/project/'.$pj['thumbnail']?>);"></div>
                    <div class="mainThumbColor" style="background:<?=$pj['color']?>;background:linear-gradient(90deg,<?=$pj['color']?> 0%, <?=$pj['color']?>33 100%);"></div>
                    <div class="mainText">
                        <h2><?=$pj['name']?> PJ</h2>
                        <h3><em><?=$pj['english']?></em></h3>
                        <p><?=dispStrPur($pj['description'], 80)?></p>
                    </div>
                    <a href="<?=HOME_URL.'/projects/?pj='.$pj['directory']?>" class="detailsLink">詳しく見る</a>
                </div>
<?php };?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <hr>
        <div id="explanation">
            <p>学連には、期間限定であったり活動内容の変更によって活動が止まったプロジェクトがあります。これらはアーカイブとして見れるようになっているため、過去の活動に興味がある方はご覧ください。</p>
            <a href="<?=HOME_URL?>/projects/">現在活動中のプロジェクトはこちらから</a>
        </div>
    </div>
<?php include_once(VIEW_DIR.'/foot-nav.php');?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');