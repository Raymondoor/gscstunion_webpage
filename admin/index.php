<?php
//Functional files below
$dir_back = "../";
$dir = "admin";
require_once "{$dir_back}backend/app/lib/init.php";
require_once "{$dir_back}backend/app/config/init.php";
//GUI files below
$pageTitle = "GSC学生連合 | 管理者ページ";
//header
include "{$dir_back}backend/app/views/header.php";
?>

    <main>
        <h2>admin page</h2>
        <div id="addScriptform">
            <form action="../api/add_article.php" method="post" enctype="multipart/form-data">
                <label>タイトル：</label><br>
                <input type="text" name="title" id="title" placeholder="Title" autofocus><br>
                <label for="main">本文：</label><br>
                <textarea id="main" name="main" rows="10" cols="30" required></textarea><br>
                <label>リンク：</label><br>
                <input type="text" name="url" id="url" placeholder="URL"><br>
                <label>画像ファイル：</label><br>
                <input type="file" name="media" id="media" placeholder="Image"><br>
                <button type="submit">投稿</button>
            </form>
        </div>
    </main>

<?php
include "{$dir_back}backend/app/views/footer.php";
?>