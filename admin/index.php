<?php $title = 'GSC学生連合 | 管理者ページ';
$file = 'ADMIN';
$root = '../';
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
if (!isset($_SESSION['user'])) {
    return_header(ROOT_LINK . '/admin/login.php?error=Please_Login_To_access_Admin_Page');
}
?>
<main>
    <ul>
        <li><a href="dev/">dev</a></li>
        <li><a href="sns/">sns</a></li>
    </ul>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');