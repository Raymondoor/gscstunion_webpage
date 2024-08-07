<?php
//Functional files below
$dir_back = "../";
$dir = "login";
require_once "{$dir_back}backend/app/lib/init.php";
require_once "{$dir_back}backend/app/config/init.php";
//GUI files below
$pageTitle = "GSC学生連合 | ログインページ";
//header
require_once "{$dir_back}backend/app/views/header.php";
?>

    <main>
        <h2>Login</h2>
        <div id="login-form">
                <form action="../api/login_bridge.php" method="post">
                <label>Username:</label><br>
                <input type="text" name="username" autofocus autocomplete="off"><br>
                <label>Password:</label><br>
                <input type="password" name="password"><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </main>

<?php
include "{$dir_back}backend/app/views/footer.php";
?>