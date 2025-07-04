<?php require_once(__DIR__.'/vendor/autoload.php');
use Raymondoor\Model\Display;
use Raymondoor\Model\Project;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\jpformatWest;
use function Raymondoor\Func\dispStrPur;
pageconfig([
    'TITLE' => '【公式】'.APP_NAME.' | 地球社会共生学部 | 青山学院大学',
    'INDEX' => 'home',
    'ALIAS' => APP_NAME
]);
$articles = Display::articles_index(6);
$projects = Project::all();
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
    <div id="label"><h1><?=APP_NAME?></h1></div>
    <hr>
    <div id="description">
        <h2 id="slogan">今日の挑戦、<br>明日の共生。</h2>
        <p id="details">地球社会共生学部公認の団体「学生連合」は、学部の魅力を学生目線から高める団体です。盛んな学部生交流の機会や、学生主体の学びを提供するイベント企画を通し、学部が目指す「より良い地球社会創出」の一翼を担います。</p>
        <p id="detailsNav"><a href="<?=HOME_URL?>/about/">詳しく</a></p>
    </div>
    <hr>
    <div id="latestArticles">
        <h2 class="subHeading">最新記事</h2>
        <hr>
        <div id="articlesList">
<?php foreach($articles as $art){?>
            <div class="articleContainer" style="background-color:<?=$art['color']?>;">
                <div class="thumb" style="background-image:url(<?=IMAGE_URL.'/main/article/'.$art['thumbnail']?>);"></div>
                <h4 class="artDate" style="background-color:<?=$art['color']?>;"><?=jpformatWest($art['date'])?></h4>
                <div class="card" style="background-color:<?=$art['color']?>;">
                    <h5 class="artProject"><?=$art['name']?></h5>
                    <h3 class="artTitle"><a class="artTitleLink" href="<?=HOME_URL.'/articles/page/?id='.$art['id']?>"><?=dispStrPur($art['title'],24)?></a></h3>
                    <p class="artMain"><?=dispStrPur($art['main'],30)?></p>
                    <p class="detailsLabel"><a class="detailsLabelLink" href="<?=HOME_URL.'/articles/page/?id='.$art['id']?>">詳しく見る</a></p>
                </div>
            </div>
<?php }?>
        </div>
        <hr>
        <h4 class="subHeading explore"><a href="<?=HOME_URL?>/articles/">他の記事を見る</a></h4>
    </div>
    <hr>
    <div id="projects">
        <h2 class="subHeading">プロジェクト</h2>
        <div id="projectsList">
            <div class="swiper">
                <div class="swiper-wrapper">
<?php foreach($projects as $pj){?>
                    <div class="pjContainer swiper-slide" style="background-color:<?=$pj['color']?>;">
                        <a class="thumbBg" href="<?=HOME_URL.'/projects/?pj='.$pj['directory']?>" style="background-image: url(<?=IMAGE_URL.'/main/project/'.$pj['thumbnail']?>);"></a>
                        <h3><?=$pj['name']?> PJ</h3>
                        <a class="detailA" href="<?=HOME_URL.'/projects/?pj='.$pj['directory']?>"><p class="detailP">詳しく見る</p></a>
                    </div>
<?php };?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>
<?php include_once(VIEW_DIR.'/foot-nav.php');?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');