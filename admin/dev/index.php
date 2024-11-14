<?php $title = '開発者用ページ';
$file = 'ADMIN-DEV';
$root = '../../';
// Function
require_once (__DIR__ . '/' . $root . '/app/api/general/DIR.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/LINK.php');
// modules
require_once (API_DIR . '/brand.php');

// Header
include_once (TEMPLATE_DIR . '/header.php');
if (!$_SERVER['REMOTE_ADDR'] === $_SERVER['SERVER_ADDR']) {
    return_header(ROOT_LINK);
}
?>
<main>

</main>
<?php
include_once (TEMPLATE_DIR . '/header.php');