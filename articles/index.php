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
        <ul>
            <?php include "../backend/app/lib/list_article.php"; ?>
        </ul>
    </main>

<?php
include "{$dir_back}backend/app/views/footer.php";
?>