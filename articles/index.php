<?php
//Functional files below
$dir_back = "../";
require_once "{$dir_back}backend/app/lib/init.php";
require_once "{$dir_back}backend/app/config/init.php";
//GUI files below
$pageTitle = "GSC Stunion Articles";
//header
include "{$dir_back}backend/app/views/header.php";
?>

    <main>
        <div id="art-h2">
            <h2>Articles</h2>
        </div>
        <div id="article-main">
            <div id="sortContainer">
                <div class="sort" id="type">
                    <label for="sort-type">Sort by:</label>
                    <select name="sort-type" id="sortType">
                        <option value="date" selected>日付</option>
                        <option value="title">記事タイトル</option>
                    </select>
                </div>
                <div class="sort" id="order">
                    <label for="sort-order">Sort order:</label>
                    <select name="sort-order" id="sortOrder">
                        <option value="ASC">昇順</option>
                        <option value="DESC" selected>降順</option>
                    </select>
                </div>
            </div>
            <div id="article-table">            
                <?php include "{$dir_back}backend/app/lib/list_article.php"; ?>
            </div>
        </div>
    </main>

<?php
include "{$dir_back}backend/app/views/footer.php";
?>