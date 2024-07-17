<?php
include "get_article.php";

function echoIndented($level, $text) {
    echo str_repeat("\t", $level) . $text . "\n";
}

foreach ($articles as $key => $article) {
    echo "<li><a href=\"1.php\">" . $article["title"] . "</a> / ". $article["date"] . " <br> " . $article["main"] . "</li>\n<hr>\n";
}