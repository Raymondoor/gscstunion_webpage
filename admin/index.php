<?php $title = 'GSC学生連合 | 管理者ページ';
$file = 'ADMIN';
$root = '../';
// Function
require_once (__DIR__ . '/' . $root . '/app/api/general/DIR.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/LINK.php');
require_once (API_DIR . '/general/CHECK_IP.php');
// modules
require_once (API_DIR . '/brand.php');

// Header
include_once (TEMPLATE_DIR . '/header.php');
if (!ip_in_range($_SERVER['REMOTE_ADDR'], $allowed_network)) {
    return_header('/');
}
if (!isset($_SESSION['user'])) {
    return_header('/admin/login.php?error=Please_Login_To_access_Admin_Page');
}
?>
<main>
    <ul>
        <li><a href="articles/">新しい記事を書く</a></li>
        <li><a href="articles/delete.php">記事を削除する</a></li>
        <li><a href="sns/">SNSリンク管理</a></li>
        <li><a href="dev/">ステータス</a></li>
    </ul>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');