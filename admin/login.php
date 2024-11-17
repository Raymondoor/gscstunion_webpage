<?php $title = 'GSC学生連合 | ログインページ';
$file = 'ADMIN-LOGIN';
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
if (!ip_in_range($_SERVER['REMOTE_ADDR'], NETWORK_RANGE)) {
    return_header('/');
}
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
?>
<main>
    <h2 id="login-h2">Login Page</h2>
    <span id="login-form">
        <form action="<?= FORM_URL . '/adm-login.php' ?>" method="post">
            <input type="hidden" name="csrf" value="<?= $_SESSION['csrf']; ?>">
            <label>Username:</label><br>
            <input type="text" name="username" autofocus autocomplete="off"><br>
            <label>Password:</label><br>
            <input type="password" name="password"><br>
            <input type="submit" value="Login" id="loginBtn">
        </form>
        <p>
<?php if (isset($_SESSION['loginerr'])) {
    echo $_SESSION['loginerr'];
    unset($_SESSION['loginerr']);
} ?>
        </p>
    </span>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');