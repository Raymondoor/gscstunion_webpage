<?php global $SEO, $SNS, $content;
$title = '';
$file = 'HOME';
$root = './';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <div id="home-banner">
        <video  muted autoplay loop id="hb-video">
            <!--<source src="<?=IMAGES_URL?>/main/00015.mp4" type="video/mp4">-->
        </video>
        <div id="hb-text">
            <h1><?=$SEO['Organization']?></h1>
            <h3><ruby>地球社会共生学部学生連合<rt>ちきゅうしゃかいきょうせいがくぶがくせいれんごう</rt><rp>ちきゅうしゃかいきょうせいがくぶがくせいれんごう</rp></ruby></h3>
            <h3>青山学院大学</h3>
        </div>
    </div>
    <hr>
    <div id="aboutus">
        <div id="slogan">
            <?=$content['slogan'].PHP_EOL?>
        </div>
        <div id="au-description">
            <?=$content['description'].PHP_EOL?>
        </div>
    </div>
    <hr>
    <div id="latestArticles">
        <h2>新着記事</h2>
        <div id="articlesContainer">
<?=list_articles_home()?>
        </div>
    </div>
    <hr>
    <div id="gallery">
        写真スライドショー<br>Coming Soon...
    </div>
    <hr>
    <div id="sns">
        <h2>SNS</h2>
        <div id="snsRest">
            <div id="snsContainer">
<?php foreach($SNS as $tag){?>
                <div class="account">
                    <a href="<?=$tag['Link']?>" target="_blank">
                        <div class="icon" style="background-image: url(<?=IMAGES_URL.'/share/sns/'.$tag['Icon']?>);"></div>
                        <h3><?=$tag['Title']?></h3>
                        <p>(<?=$tag['Username']?>)</p>
                    </a>
                </div>
<?php }?>
            </div>
            <p id="message">SNSでもGSC学生連合の活動状況や開催予定のイベント情報を発信しています。皆さまからのフォローをお待ちしております。</p>
        </div>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');