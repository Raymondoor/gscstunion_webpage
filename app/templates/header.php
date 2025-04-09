<?php include_once(__DIR__.'/head.php')?>
<body>
<header>
    <nav>
        <div id="rel_link">
            <p><a href="<?=APP_URL?>/">ホーム</a></p>
            <p class="mobhid"><a href="<?=APP_URL?>/projects/">プロジェクト</a></p>
            <p class="mobhid"><a href="<?=APP_URL?>/articles/">記事</a></p>
            <p class="mobhid"><a href="<?=APP_URL?>/timeline/">タイムライン</a></p>
            <p class="mobhid"><a href="<?=APP_URL?>/about/">私たちについて</a></p>
        </div>
        <div id="hb-menu">
            <hr><hr><hr>
        </div>
        <div id="hb-nav">
            <div id="nav-rel_link">
                <div id="nav-link-nav">
                    <hr>   
                    <h3>NAVIGATION</h3>
                    <hr>
                    <ul>
                        <li><a href="<?=APP_URL?>/">ホーム</a></li>
                        <li><a href="<?=APP_URL?>/projects/">プロジェクト</a></li>
                        <li><a href="<?=APP_URL?>/articles/">記事</a></li>
                        <li><a href="<?=APP_URL?>/timeline/">タイムライン</a></li>
                        <li><a href="<?=APP_URL?>/archive/">アーカイブ</a></li>
                        <li><a href="<?=APP_URL?>/about/">私たちについて</a></li>
                    </ul>
                    <hr>
                </div>
                <div id="nav-link-info">
                    <hr>
                    <h3>INFORMATION</h3>
                    <hr>
                    <ul>
                        <li><a href="<?=APP_URL?>/about/sns/">ソーシャルメディア</a></li>
                        <li><a href="<?=APP_URL?>/about/outlink/">外部リンク</a></li>
                        <li><a href="<?=APP_URL?>/about/location/">所在地</a></li>
                        <li><a href="<?=APP_URL?>/about/policy/">各種方針</a></li>
                        <li><a href="<?=APP_URL?>/about/license/">利用規約・ライセンス</a></li>
                        <li><a href="<?=APP_URL?>/about/contact/">お問い合わせ</a></li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div id="projects-container">
<?=list_projects_index()?>
            </div>
        </div>
    </nav>
    <hr>
</header><?=PHP_EOL;