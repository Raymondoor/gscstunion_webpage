<?php
require_once (__DIR__ . '/../general/DIR.php');
require_once (API_DIR . '/general/DATABASE_PROCESS.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/TEXT_FORMAT.php');
require_once (API_DIR . '/delete_article.php');

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['password'])) {
        $query = new DatabaseStatement("SELECT password FROM user");
        $password = $query->Operation([]);
        if (password_verify($_POST['password'], $password[0]['password'])) {
            $DeleteArticle = new Delete_article($_POST['id']);
            if ($DeleteArticle->DeleteDB()) {
                sleep(0.3);
                $_SESSION['delarterr'] = '*削除に成功しました。';
                return_header('/admin/articles/delete.php');
            } else {
                $_SESSION['delarterr'] = '*サーバー側でエラーが発生しました。手動で削除するか広報に連絡するかしてね';
                // return_header('/admin/articles/delete.php?error=Server_Error_Please_Proceed_Manually');
            }
        } else {
            $_SESSION['delarterr'] = '*パスワードが間違ってるよ！';
            return_header('/admin/articles/delete.php?error=Password_Incorrect');
        }
    } else {
        $_SESSION['delarterr'] = '*パスワードを入力してね！（ログインするときに使ったやつだよ）';
        return_header('/admin/articles/delete.php?error=Please_Fill_Password');
    }
}