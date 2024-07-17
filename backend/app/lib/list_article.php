<?php
include "get_article.php";

function echoIndented($level, $text) {
    echo str_repeat("\t", $level) . $text . "\n";
}

foreach ($articles as $key => $article) {
    echo "<li>" . $article["title"] . " / ". $article["date"] . " <br> " . $article["main"] . "</li>\n<hr>\n";
}