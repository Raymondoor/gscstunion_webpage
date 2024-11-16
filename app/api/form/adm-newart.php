<?php
require_once (__DIR__ . '/../general/DIR.php');
require_once (API_DIR . '/general/DATABASE_PROCESS.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/TEXT_FORMAT.php');
require_once (API_DIR . '/new_article.php');

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['main'])) {
        $Title = sanitize_text($_POST['title']);
        $Date = sanitize_text($_POST['date']);
        $Main = sanitize_text($_POST['main']);
        $Video = '';
        if (!empty($_POST['video'])) {
            if (preg_match('/(https?:\/\/[^\s]+[^.,;:\s])/', $_POST['video'])) {
                $Video = $_POST['video'];
            } else {
                $_SESSION['newarterr'] = '*動画リンク形式が間違っています。';
                return_header('/admin/articles?error=Invalid_Video_Link_Format');
            }
        }
        $NewArticle = new New_article($Title, $Date, $Main, $Video);
        $result = $NewArticle->InsertDB();
        if (!empty($result)) {
            sleep(0.3);
            return_header('/articles/page/' . $result . '.php');
        }
    } else {
        $_SESSION['newarterr'] = '*全ての欄を埋めてください。';
        return_header('/admin/articles?error=All_Input_Required');
    }
}