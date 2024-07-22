<?php
include "get_article.php";



foreach ($articles as $key => $article) {
    echo "
            <div class=\"article-container\">
                <span class=\"a-title\"><a href=\"1.php\">" . $article["title"] . "</a></span> / <span class=\"a-date\">". $article["date"] . "</span> <br>
                <div class=\"a-main\"><p>" . mb_substr($article["main"], 0, 20, 'UTF-8') . (mb_strlen($article["main"], 'UTF-8') > 20 ? '...' : '') . "</p></div>
            </div><hr>\n";
}