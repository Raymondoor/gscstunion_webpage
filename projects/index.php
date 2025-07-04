<?php require_once(__DIR__.'/../vendor/autoload.php');

use Raymondoor\Model\Project;

use function Raymondoor\Func\dispStrPur;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\return_header;

if(isset($_GET['pj'])):

$dir = $_GET['pj'];
$pj = Project::project('directory', $dir);
if(empty($pj)){
    return_header('/projects/');
}
pageconfig([
    'TITLE' => $pj['name'].' PJ | '.APP_NAME,
    'INDEX' => 'project',
    'ALIAS' => 'プロジェクト'
]);

include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/project.php');?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');

else:

$projects = Project::all();
pageconfig([
    'TITLE' => 'プロジェクト | '.APP_NAME,
    'INDEX' => 'projects',
    'ALIAS' => 'プロジェクト'
]);

include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
    <h1 class="subHeading">プロジェクト一覧</h1>
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
                        <p><?=dispStrPur($pj['description'], 150)?></p>
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
            <p>学生連合ではご覧のプロジェクトごとに様々な企画を行っています。学連員は各自の希望するプロジェクトに複数参加し、学部を盛り上げるために日々活動しています。</p>
            <a href="<?=HOME_URL?>/archive/">アーカイブはこちらから</a>
        </div>
    </div>
    <hr>
    <div thumbsSlider="" class="swiper subSwiper" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff">
        <div class="swiper-wrapper">
<?php foreach($projects as $pj){?>
            <div class="swiper-slide" style="background-color:<?=$pj['color']?>;">
                <div class="subThumb" style="background-image:url(<?=IMAGE_URL.'/main/project/'.$pj['thumbnail']?>);"></div>
            </div>
<?php };?>
        </div>
    </div>
<?php include_once(VIEW_DIR.'/foot-nav.php');?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
endif;