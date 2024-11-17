<?php $title = '記事一覧 | GSC学生連合';
$file = 'ARTICLES';
$root = '../';
// Function
require_once (__DIR__ . '/' . $root . '/app/api/general/DIR.php');
require_once (API_DIR . '/general/HEADER.php');
require_once (API_DIR . '/general/LINK.php');
require_once (API_DIR . '/general/CHECK_IP.php');
require_once (API_DIR . '/list_articles.php');
// modules
require_once (API_DIR . '/brand.php');

// Header
include_once (TEMPLATE_DIR . '/header.php');
?>
<main>
    <div id="art-h2">
        <h2>Articles</h2>
    </div>
    <div id="article-main">
        <div id="sortContainer">
            <div class="sort" id="type">
                <label for="sort-type">Sort by:</label>
                <select name="sort-type" id="sortType" title="sort type">
                    <option value="date" selected>日付</option>
                    <option value="title">記事タイトル</option>
                </select>
            </div>
            <div class="sort" id="order">
                <label for="sort-order">Sort order:</label>
                <select name="sort-order" id="sortOrder" title="sort order">
                    <option value="ASC">昇順</option>
                    <option value="DESC" selected>降順</option>
                </select>
            </div>
        </div>
        <div id="article-table">            
            <?php echo list_articles() ?>
        </div>
    </div>
</main>
<?php
include_once (TEMPLATE_DIR . '/footer.php');