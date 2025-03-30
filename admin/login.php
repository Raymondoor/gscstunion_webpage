<?php $title='ログイン';
$file='ADMIN'.'-'.'LOGIN';
$root='../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');
require_once(API_DIR.'/validate_admin.php');
session_start();
ip_gate();
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}
include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
<?php if(!isset($_SESSION['over'])) { ?>
    <div id="login-form">
        <form action="<?=FORM_URL.'/adm-login.php'?>" method="post">
            <h2 id="login-h2">ログイン</h2>
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <label>ユーザー名：</label><br>
            <input type="text" name="username" autofocus autocomplete="off"><br>
            <label>パスワード：</label><br>
            <input type="password" name="password"><br>
            <input type="submit" value="ログイン" id="loginBtn">
        </form>
<?php
if(isset($_SESSION['loginerr'])){ ?>
        <p><?=$_SESSION['loginerr']?></p>
    <?php unset($_SESSION['loginerr']);
}else{ ?>
        <p></p>
<?php }?>
    </div>
<?php } ?>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');