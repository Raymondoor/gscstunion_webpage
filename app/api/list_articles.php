<?php
require_once (__DIR__ . '/general/DIR.php');
require_once (API_DIR . '/general/DATABASE_PROCESS.php');

function list_articles(){
    $query = new DatabaseStatement("SELECT * FROM article ORDER BY id DESC");
    $list = $query->Operation([]);
    $content = '';
    foreach ($list as $key => $article) {
        $content .= '
            <div class="article-container" data-id="' . $article['id'] . '">
                <span class="a-title"><a href="' . APP_URL . '/articles/page/' . $article['id'] . '.php">' . $article['title'] . '</a></span> / <span class="a-date">' . $article['date'] . '</span><br>
                <div class="a-main"><p>' . mb_substr($article['main'], 0, 50, 'UTF-8') . (mb_strlen($article['main'], 'UTF-8') > 50 ? '...' : '') . '</p></div>
            </div><hr>' . PHP_EOL;
    }
    return $content;
}
function list_articles_delete () {
    $query = new DatabaseStatement("SELECT * FROM article ORDER BY id DESC");
    $list = $query->Operation([]);
    $content = '';
    foreach ($list as $key => $article) {
        $content .= '
            <div class="article-container" data-id="' . $article['id'] . '">
                <div class="a-title"><a href="' . APP_URL . '/articles/page/' . $article['id'] . '.php">' . $article['title'] . '</a>
                </div><div class="a-date">投稿日： ' . $article['date'] . '</div>
                <button class="show" data-target="delete' . $article['id'] . '">この記事を削除する</button>
                <form action="' . FORM_URL . '/adm-delart.php" method="post" class="confirm hidden" id="delete' . $article['id'] . '">
                    <input type="hidden" name="id" value="' . $article['id'] . '">
                    <input type="password" name="password" placeholder="パスワードを入力してください">
                    <button type="submit">確定</button>
                </form>
            </div><hr>' . PHP_EOL;
    }
    return $content;
}