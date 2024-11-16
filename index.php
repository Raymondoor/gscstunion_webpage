<?php $title = '【公式】GSC学生連合 | 地球社会共生学部 | 青山学院大学';
$file = 'HOME';
$root = './';
// Function
require_once (__DIR__ . '/' . $root . '/app/api/general/DIR.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/LINK.php');
// modules
require_once (API_DIR . '/brand.php');

// Header
include_once (TEMPLATE_DIR . '/header.php');

?>
<main>
    <div id="home-banner">
        <h2>GSC Stunion</h2>
        <h3><ruby>地球社会共生学部学生連合<rt>ちきゅうしゃかいきょうせいがくぶがくせいれんごう</rt><rp>ちきゅうしゃかいきょうせいがくぶがくせいれんごう</rp></ruby></h3>
        <h4>青山学院大学</h4>
    </div>
    <div id="aboutus">
        <div id="slogan">
            <h2>今日の挑戦、<br>明日の共生。</h2>
        </div>
        <div id="au-description">
            <p>地球社会共生学部公認の団体「学生連合」は、学部の魅力を学生目線から高める団体です。
                盛んな学部生交流の機会や、学生主体の学びを提供するイベント企画を通し、学部が目指す「より良い地球社会創出」の一翼を担います。</p>
        </div>
    </div>
    <hr>
    <div id="socialpage">
        <div id="socialpagenav">
            <div class="spn-container">
                <a href="<?= $SEO['SNS']['IG']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['IG']['Title'] ?>">
                <img src="<?= $root . IMAGES_LINK; ?>/share/WInstagram.png" alt="<?= $SEO['SNS']['IG']['Title'] ?>" class="socialpagelogo">Instagram</a>
            </div>
            <div class="spn-container">
                <a href="<?= $SEO['SNS']['X']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['X']['Title'] ?>">
                <img src="<?= $root . IMAGES_LINK; ?>/share/WX.png" alt="<?= $SEO['SNS']['X']['Title'] ?>" class="socialpagelogo">X(Twitter)</a>
            </div>
        </div>
        <div id="hdescription">
        <h4>青山学院大学 地球社会共生学部 学生連合の公式HPです。🌐</h4>
        <p>
            現在は主に「<a href="<?= $SEO['SNS']['IG']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['IG']['Title'] ?>">Instagram</a>」にて活動しています！また、春には高校生向けの告知を「<a href="<?= $SEO['SNS']['X']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['X']['Title'] ?>">X</a>」でも行っています。興味のある方は是非上のリンクからご覧ください！質問等、随時SNSのDMにて受け付けています！
        </p>
        </div>
    </div>
</main>
<?php
//footer
include_once (TEMPLATE_DIR . '/footer.php');