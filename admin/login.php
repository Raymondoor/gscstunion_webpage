<?php
//Functional files below
$dir_back = "../";
$dir = "login";
require_once "{$dir_back}backend/app/lib/init.php";
require_once "{$dir_back}backend/app/config/init.php";
//GUI files below
$pageTitle = "GSC Stunion Editor Login";
//header
require_once "{$dir_back}backend/app/views/header.php";
?>

    <main>
        <h2>Login</h2>
    </main>

<?php
include "{$dir_back}backend/app/views/footer.php";
?>