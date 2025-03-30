<?php $title = 'マイナースポーツ発表会ユニークスポーツ三選';
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
    <h2>マイナースポーツ発表会ユニークスポーツ三選</h2>
    <p><i>2021-06-19</i></p>
    <p>
<pre>
【ユニークスポーツ三選】ユニークスポーツと聞いて皆さんはどのようなスポーツが思い浮かぶでしょうか？
この動画では、「タスボニー」、「クィディッチ」、そして「スカッシュ」という３つのユニークなスポーツを紹介しています。どのスポーツも他とは違う魅力があり、メジャーなスポーツに負けず劣らず楽しいものばかりです。興味を持った方はぜひこの動画をご覧ください。
</pre>
    </p>
    <div id="videoContainer">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/vfoqIKVJ24E?si=4lHSU18rX6uyolBF" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');