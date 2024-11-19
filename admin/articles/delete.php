<?php $title = '記事を削除する';
$file = 'ADMIN-ARTICLES-DELETE';
$root = '../../';
// Function
require_once (__DIR__ . '/' . $root . '/app/api/general/DIR.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/LINK.php');
require_once (API_DIR . '/general/TEXT_FORMAT.php');
require_once (API_DIR . '/general/CHECK_IP.php');
require_once (API_DIR . '/list_articles.php');
// modules
require_once (API_DIR . '/brand.php');

// Header
include_once (TEMPLATE_DIR . '/header.php');
if (!ip_in_range($_SERVER['REMOTE_ADDR'], NETWORK_RANGE)) {
    return_header('/');
}
if (!isset($_SESSION['user'])) {
    return_header('/admin/login.php?error=Please_Login_To_access_Admin_Page');
}
?>
<main>
    <h2>記事を削除する</h2>
<?php if (isset($_SESSION['delarterr'])) {
    echo $_SESSION['delarterr'];
    unset($_SESSION['delarterr']);
} ?>
    <?php echo list_articles_delete() ?>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');