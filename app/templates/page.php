<div id="articleContainer">
    <div class="thumbnail" style="background-image: url(<?=IMAGES_URL.'/main/articles/thumbnail/'.$article['thumbnail']?>)"></div>
    <div id="textContainer">
        <h4 id="project"><a href="<?=PROJECTS_URL.'/'.$project['pDirName']?>/" style="color: #<?=$project['pColour']?>;"><?=$project['pName']?></a></h4>
        <h1 id="title"><?=$article['title']?></h1>
        <div id="info">
            <div id="actualinfo">
                <p id="date"><i><?=$article['date']?></i></p>
                <p>#<?=$hashtag['hName']?></p>
            </div>
            <button id="clipboardButton" onclick="copyToClipboard(this)">URLをコピーする</button>
        </div>
        <hr>
        <div id="content">
        <?=URL_replace($article['main'])?>
        </div>
    </div>
</div>