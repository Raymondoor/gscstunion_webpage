<?php
include "get_article.php";



foreach ($articles as $key => $article) {
    echo "
            <div class=\"article-container\" data-id=\"" . $article['id'] . "\">
                <span class=\"a-title\"><a href=\"page/a" . $article["id"] . ".php\">" . $article["title"] . "</a></span> / <span class=\"a-date\">". $article["date"] . "</span> <br>
                <div class=\"a-main\"><p>" . mb_substr($article["main"], 0, 50, 'UTF-8') . (mb_strlen($article["main"], 'UTF-8') > 50 ? '...' : '') . "</p></div>
            </div><hr>\n";
}