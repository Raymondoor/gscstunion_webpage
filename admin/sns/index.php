<?php $title = 'SNSリンク管理';
$file = 'ADMIN-SNS';
$root = '../../';
// Function
require_once (__DIR__ . '/' . $root . '/app/api/general/DIR.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/LINK.php');
require_once (API_DIR . '/general/TEXT_FORMAT.php');
require_once (API_DIR . '/general/CHECK_IP.php');
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
    <form action="<?= FORM_URL . '/adm-sns.php' ?>" method="post">
<?php foreach ($SEO['SNS'] as $sns => $data) { ?>
        <label for="<?= $sns ?>">イニシャル:</label>
        <input type="text" value="<?= $sns ?>" name="sns[<?= $sns ?>][Tag]"><br>
        <label for="<?= $data['Title'] ?>">表示名:</label>
        <input type="text" value="<?= $data['Title'] ?>" name="sns[<?= $sns ?>][Title]"><br>
        <label for="<?= $data['Username'] ?>">ユーザー名:</label>
        <input type="text" value="<?= $data['Username'] ?>" name="sns[<?= $sns ?>][Username]"><br>
        <label for="<?= $data['Link'] ?>">リンク:</label>
        <input type="url" value="<?= $data['Link'] ?>" name="sns[<?= $sns ?>][Link]"><br>
        <label>削除</label>
        <input type="checkbox" name="sns[<?= $sns ?>][Delete]"><br>
<?php } ?>
        <p>新しいプラットフォーム</p>
        <label for="newInitial">イニシャル:</label>
        <input type="text" name="new[Tag]"><br>
        <label for="newTitle">表示名:</label>
        <input type="text" name="new[Title]"><br>
        <label for="newUsername">ユーザー名:</label>
        <input type="text" name="new[Username]"><br>
        <label for="newLink">リンク:</label>
        <input type="url" name="new[Link]"><br>
        <input type="submit" value="Update SNS">
    </form>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');