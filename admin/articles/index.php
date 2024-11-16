<?php $title = '新しい記事を書く';
$file = 'ADMIN-ARTICLES-NEW';
$root = '../../';
// Function
require_once (__DIR__ . '/' . $root . '/app/api/general/DIR.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/LINK.php');
require_once (API_DIR . '/general/TEXT_FORMAT.php');
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
    <h2>新しい記事を書く</h2>
    <form action="<?= FORM_URL . '/adm-newart.php' ?>" method="post">
        <label for="title">*タイトル</label>
        <input type="text" name="title" placeholder="タイトル" autocomplete="off" id="title"><br>
        <label for="date">*日付</label>
        <input type="text" name="date" placeholder="yyyy-mm-dd" value="<?= date('Y-m-d') ?>"><br>
        <label for="main">*内容</label>
        <textarea name="main"></textarea><br>
        <label for="video">埋め込み動画（任意）</label>
        <input type="text" name="video" placeholder="例: <iframe src=&quot;https://www.youtube.com/embed/&quot;>" id="video"><br>
        <input type="submit" value="投稿する">
    </form>
    <p>
<?php if (isset($_SESSION['newarterr'])) {
    echo $_SESSION['newarterr'];
    unset($_SESSION['newarterr']);
} ?>
    </p>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');