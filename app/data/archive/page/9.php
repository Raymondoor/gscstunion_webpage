<?php $title = 'これは試験用の記事です。';
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
    <h2>これは試験用の記事です。</h2>
    <p><i>2024-11-19</i></p>
    <p>
<pre>
これは試験用の記事です。特にいうことはありません。
</pre>
    </p>
    <div id="videoContainer">
        
    </div>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');