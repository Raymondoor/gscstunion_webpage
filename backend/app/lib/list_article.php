<?php
include "get_article.php";



foreach ($articles as $key => $article) {
    echo "<a href=\"1.php\">" . $article["title"] . "</a> / ". $article["date"] . " <br> " . $article["main"] . "\n<hr>\n";
}