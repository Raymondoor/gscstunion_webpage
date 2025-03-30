<?php $title = 'マイナースポーツ発表会迫力満点スポーツ三選';
$file = 'PAGE';
$root = '../../';
// Function
require_once (__DIR__ . '/' . $root . '/app/api/general/DIR.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/LINK.php');
require_once (API_DIR . '/general/CHECK_IP.php');
// modules
require_once (API_DIR . '/brand.php');

// Header
include_once (TEMPLATE_DIR . '/header.php');
?>
<main>
    <h2>マイナースポーツ発表会迫力満点スポーツ三選</h2>
    <p><i>2021-06-19</i></p>
    <p>
<pre>
【迫力満点スポーツ三選】

　この動画では、ぶつかり合ったり飛び込んだりという迫力満点のスポーツが紹介されています。しかし、そのようなプレーの中にも、相手のことを賞賛し転んだ時には手を伸ばす名シーンが繰り広げられています。 動画で興味を持った方は、ぜひ会場まで足を運び、ご自身でもマイナースポーツを楽しんでみてくださいね。
</pre>
    </p>
    <div id="videoContainer">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/TiiZer8G63o?si=O5d-zUOtsV95xmj6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');