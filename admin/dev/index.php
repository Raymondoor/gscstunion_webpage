<?php $title = 'GSC学生連合 | 開発者用ページ';
$file = 'ADMIN-DEV';
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
/*
if (!$_SERVER['REMOTE_ADDR'] === $_SERVER['SERVER_ADDR']) {
    return_header('/');
}
if (!isset($_SESSION['user'])) {
    return_header('/admin/login.php?error=Please_Login_To_access_Admin_Page');
}
    */
?>
<main>
    <p>Username: <?= str_rot13($_SESSION['user']) ?></p>
    <ul>
        <li><a href="./phpinfo.php">phpinfo</a></li>
        <li>$_SERVER↓<pre><?= print_r($_SERVER) ?></pre></li>
        <li>$_SESSION↓<pre><?= print_r($_SESSION) ?></pre></li>
    </ul>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');