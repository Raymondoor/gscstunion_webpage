<?php
use function Raymondoor\Func\indexIs;
?>
<header>
    <div id="bar">
        <a href="<?=HOME_URL?>/" class="icon" title="Home"><div id="image"></div></a>
        <div id="current"><h1><?=\App::get('ALIAS')?></h1></div>
        <div id="hamburger" tabindex="0" onclick="expandHeader()">
            <hr><p>MENU</p><hr>
        </div>
    </div>
    <nav id="navHeader">
        <ul>
            <li><a href="<?=HOME_URL?>/" class="<?=indexIs('home')?'isActive':''?>">ホーム</a></li>
            <li><a href="<?=HOME_URL?>/projects/" class="<?=indexIs('projects')?'isActive':''?>">プロジェクト</a></li>
            <li><a href="<?=HOME_URL?>/articles/" class="<?=indexIs('articles')?'isActive':''?>">記事</a></li>
            <li><a href="<?=HOME_URL?>/timeline/" class="<?=indexIs('timeline')?'isActive':''?>">タイムライン</a></li>
            <li><a href="<?=HOME_URL?>/about/" class="<?=indexIs('about')?'isActive':''?>">私たちについて</a></li>
        </ul>
    </nav>
</header>