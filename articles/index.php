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
        <h2>Articles</h2>
        <form id="sortForm">
            <div id="sort-container">
                
                    <div class="sort" id="sort-type">
                        <label for="Date:">
                        <input type="radio" id="Date" value="date" name="sort-type">Date:
                        </label>
                        <label for="Alphabet:">
                        <input type="radio" id="Alphabet" value="title" name="sort-type">Alphabet:
                        </label>
                    </div>
                    <div class="sort" id="sort-order">
                        <label for="Ascend:">
                        <input type="radio" id="asc" value="ASC" name="sort-order">Ascend:
                        </label>
                        <label for="Descend:">
                        <input type="radio" id="desc" value="DESC" name="sort-order">Descend:
                        </label>
                    </div>
                    <div id="submit"><input type="submit" value="submit"></div>
                
            </div>
        </form>
        <div class="article-table-container">
            <ul id="article-list">
                <?php include "../backend/app/lib/list_article.php"; ?>
            </ul>
        </div>
    </main>

<?php
include "{$dir_back}backend/app/views/footer.php";
?>