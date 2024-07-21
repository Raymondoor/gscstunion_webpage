<?php
include "get_article.php";



foreach ($articles as $key => $article) {
    echo "
            <div class=\"article-container\">
                <span class=\"a-title\"><a href=\"1.php\">" . $article["title"] . "</a></span> / <span class=\"a-date\">". $article["date"] . "</span> <br>
                <div class=\"a-main\"><p>" . $article["main"] . "</p></div>
            </div><hr>\n";
}