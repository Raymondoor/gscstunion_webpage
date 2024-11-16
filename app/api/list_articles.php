<?php
require_once (__DIR__ . '/general/DIR.php');
require_once (API_DIR . '/general/DATABASE_PROCESS.php');

function list_articles(){
    $query = new DatabaseStatement("SELECT * FROM article ORDER BY id DESC");
    $list = $query->Operation([]);
    $content = '';
    foreach ($list as $article) {
        $content .= '
            <div class="article-container" data-id="' . $article['id'] . '">
                <span class="a-title"><a href="./page/' . $article['id'] . '.php">' . $article['title'] . '</a></span> / <span class="a-date">' . $article['date'] . '</span><br>
                <div class="a-main"><p>' . mb_substr($article['main'], 0, 50, 'UTF-8') . (mb_strlen($article['main'], 'UTF-8') > 50 ? '...' : '') . '</p></div>
            </div><hr>' . PHP_EOL;
    }
    return $content;
}