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
        <h2 id="adh2">編集ページ</h2>
        <h4 id="adh4">新しい記事を書く</h4>
        <div id="addScriptform">
            <form action="../api/add_article.php" method="post" enctype="multipart/form-data">
                <label>タイトル（必須）：</label><br>
                <input type="text" name="title" id="title" placeholder="タイトル" autofocus><br>
                <label for="main">本文（必須）：</label><br>
                <textarea id="main" name="main" rows="10" cols="30" required></textarea><br>
                <label>リンク：</label><br>
                <input type="text" name="url" id="url" placeholder="リンク"><br>
                <label>ファイル（画像を選択できます）：</label><br>
                <input type="file" name="media" id="media"><br>
                <button type="submit">投稿</button>
            </form>
        </div>
        <div id="adexm">
            <h2 id="patitle">サンプル記事タイトル</h2>
            <p id="padate">20XX-01-01</p>
            <p id="pamain">この記事はサンプルです。投稿した内容はこのように出力されます。リンクと画像は一つまで掲載することが出来ます。日付は投稿した当日のものが自動的に反映されます。画像には黒い縁が付きます。</p>
            <img src="../assets/images/icon/GSCstunionlogo.jpg">
        </div>
    </main>

<?php
include "{$dir_back}backend/app/views/footer.php";
?>