<?php
$dir_back = "../";
include "{$dir_back}backend/app/lib/login_handle.php";
include "{$dir_back}backend/app/lib/session_time.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {

    session_start();

    // Check if the CSRF token in the session matches the one in the form
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token validation failed');
    }

    function validate($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    $username = validate($_POST["username"]);
    $password = validate($_POST["password"]);

    $accept = false;

    if (empty($username) || empty($password)) {
        header("Location: {$dir_back}admin/login.php?error=Invalid_Input");
    }
    else {

        foreach ($loginInfo as $key => $crededtial) {
            if ($username === ($crededtial["username"]) && password_verify($password, $crededtial["password"])) {
                $accept = true;
                break;
            }
        }
        if (!$accept) {
            header("Location: {$dir_back}admin/login.php?error=Invalid_Input");
            exit;
        }
        else if ($accept) {
            setcookie("verified", "yes", time() + $sessionTime,"/");
            header("Location: {$dir_back}admin/");
            exit;
        }
    }
}