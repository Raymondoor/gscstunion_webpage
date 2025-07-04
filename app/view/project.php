<?php
use Raymondoor\Model\Display;
use function Raymondoor\Func\dispStrPur;
use function Raymondoor\Func\jpformatWest;

// basic
$limit = 8;
$index = 1;
if(!empty($_GET['index'])){
    $index = (int)$_GET['index'];
}
$lastkey = array_key_last(Display::lastArticleId($pj['id'])) + 1;
// calc
$lastindexfl = $lastkey / $limit;
$lastindex = (int) floor($lastindexfl);
if($lastkey % $limit !== 0){
    $lastindex++;
}
$offset = 0;
if($index !== 1){
    $offset = $index*$limit-$limit;
}

$pjurl = HOME_URL.'/projects/?pj='.$pj['directory'];
?>
<div id="projectContainer">
    <div id="overview" style="background-color:<?=$pj['color']?>;">
        <div id="thumb" style="background-image: url(<?=IMAGE_URL.'/main/project/'.$pj['thumbnail']?>);"></div>
        <h2 id="pjname"><?=$pj['name']?> PJ</h2>
        <h4 id="pjeng"><em><?=$pj['english']?></em></h4>
        <hr>
        <p id="pjdesc"><?=$pj['description']?></p>
    </div>
    <hr>
    <div id="articles">
        <h2>記事一覧</h2>
        <hr>
<?php
$pjart = Display::articles_pj($pj['id'], $limit, $offset);
if(empty($pjart)){?>
        <div class="artContainer" style="background-color:<?=$pj['color']?>;">
            <div class="artThumb" style="background-color:#eee;"></div>
            <div class="text">
                <h3 style="text-decoration:underline;">このプロジェクトにはまだ記事がありません。ごめんね😢</h3>
                <p></p>
            </div>
        </div>
        <hr>
<?php }
foreach($pjart as $art){?>
        <a class="artContainer" href="<?=HOME_URL.'/articles/page/?id='.$art['id']?>" style="background-color:<?=$pj['color']?>;">
            <div class="artThumb" style="background-image:url(<?=IMAGE_URL.'/main/article/'.$art['thumbnail']?>);"></div>
            <div class="text">
                <h3 style="text-decoration:underline;"><?=dispStrPur($art['title'], 40)?></h3>
                <p><em><?=jpformatWest($art['date'])?></em></p>
                <p><?=dispStrPur($art['main'], 120)?></p>
            </div>
        </a>
        <hr>
<?php }
?>
        <div id="pagenav">
<?php if($index === 1){?>
            <a href="<?=$pjurl?>&index=<?=$index?>" style="font-weight: bold;" class="isPage"><?=$index?></a>
    <?php if($lastkey > $limit){?>
            <a href="<?=$pjurl?>&index=<?=$index+1?>"><?=$index+1?></a>
        <?php if($lastindex !== 2){?>
            ...<a href="<?=$pjurl?>&index=<?=$lastindex?>"><?=$lastindex?></a>
        <?php }?>
    <?php }?>
<?php }elseif($index == $lastindex){?>
            <a href="<?=$pjurl?>">1</a>
    <?php if($index -1 != 1){?>
            ... <a href="<?=$pjurl?>&index=<?=$index-1?>"><?=$index-1?></a>
    <?php }?>
            <a href="<?=$pjurl?>&index=<?=$index?>" class="isPage"><?=$index?></a>
<?php }else{?>
        <a href="<?=$pjurl?>">1</a>
    <?php if($index != 2){?>
        ... <a href="<?=$pjurl?>&index=<?=$index-1?>"><?=$index-1?></a>
    <?php }?>
        <a href="<?=$pjurl?>&index=<?=$index?>" class="isPage"><?=$index?></a>
    <?php if($index != $lastindex -1){?>
        <a href="<?=$pjurl?>&index=<?=$index+1?>"><?=$index+1?></a> ...
    <?php }?>
        <a href="<?=$pjurl?>&index=<?=$lastindex?>"><?=$lastindex?></a>
<?php }?>
        </div>
    </div>
</div>