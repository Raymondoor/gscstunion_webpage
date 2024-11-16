<?php
require_once (__DIR__ . '/../general/DIR.php');
require_once (API_DIR . '/general/DATABASE_PROCESS.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/TEXT_FORMAT.php');
require_once (API_DIR . '/general/LOG.php');

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
        die('Invalid Access');
    }
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Format Input
        $username = str_rot13(sanitize_text($_POST['username']));
        $password = sanitize_text($_POST['password']);
        // Fetch data from DB
        $query = new DatabaseStatement("SELECT * FROM user WHERE username = :username");
        $result = $query->Operation([':username' => $username]);
        // Check username
        if ($result[0]['username'] === $username) {
            if (password_verify($password, $result[0]['password'])) {
                $_SESSION['user'] = $username;
                $log_data = date("Y-m-d H:i:s") . ', ' . $_SERVER['HTTP_SEC_CH_UA_PLATFORM'] . ', "' . $_SERVER['HTTP_USER_AGENT'] . '"';
                generate_log('/login/login-', $log_data);
                return_header('/admin');
            } else {
                $_SESSION['loginerr'] = '*Wrong Password';
                return_header('/admin/login.php?error=Wrong_Password');
            }
        } else {
            $_SESSION['loginerr'] = '*Wrong Username';
            return_header('/admin/login.php?error=Wrong_Username');
        }
    } else {
        $_SESSION['loginerr'] = '*Fill All Blanks';
        return_header('/admin/login.php?error=Fill_All_Blanks');
    }
}
/*
$usrnm = str_rot13('');
$pswrd = password_hash('', PASSWORD_DEFAULT);
$query = new DatabaseStatement("INSERT INTO user (username, password) VALUES (:username, :password)");
$result = $query->Operation([':username' => $usrnm, ':password' => $pswrd]);
echo $result;
*/