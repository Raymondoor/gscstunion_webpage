<?php $title = 'obTITLE';
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
    <h2>obTITLE</h2>
    <p><i>obDATE</i></p>
    <p>
<pre>
obMAIN
</pre>
    </p>
    <div id="videoContainer">
        obVIDEO
    </div>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');