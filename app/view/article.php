<div id="articleContainer">
    <div id="overview">
        <div id="thumb" style="background-image: url(<?=IMAGE_URL.'/main/article/'.$art['thumbnail']?>);">
            <a href="<?=HOME_URL?>/articles/" id="refer">←記事一覧へ戻る</a>
            <div id="view">
                <p><?=$art['view']?></p><div id="viewImg"></div>
            </div>
        </div>
        <h4 id="project"><a href="<?=HOME_URL.'/projects/?pj='.$pj['directory']?>" style="color:<?=$pj['color']?>;"><?=$pj['name']?></a></h4>
        <h1 id="title"><?=$art['title']?></h1>
        <div id="xtraInfo">
            <div id="text">
                <p id="date"><em><?=$art['date']?></em></p>
                <p id="category"><a href="<?=HOME_URL.'/articles/search/?cat='.$art['category']?>">#<?=$art['category']?></a></p>
            </div>
            <button id="clipboardButton" onclick="copyToClipboard(this)" style="background-color:<?=$pj['color']?>;">URLをコピーする</button>
        </div>
        <hr>
    </div>
    <div id="main">
        <div id="prvdiv"><?=$art['main']?></div>
    </div>
</div>