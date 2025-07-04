<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Model\Article;
use Raymondoor\Model\Display;
use function Raymondoor\Func\dispStrPur;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\jpformatWest;
use function Raymondoor\Func\return_header;

$articles = [];
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $articles[0] = Article::article('id', $id);
}
$limit = 12;
$index = 1;
$srchurl = HOME_URL.'/articles/list/';
if(!empty($_GET['index'])){
    $index = (int)$_GET['index'];
}
$lastkey = array_key_last(Display::lastArticleId(0)) + 1;
// calc
$lastindexfl = $lastkey / $limit;
$lastindex = (int) floor($lastindexfl);
if($lastkey % $limit !== 0){
    $lastindex++;
}
$offset = 0;
if($index !== 1){
    $offset = $index*$limit-$limit;
}if($index > $lastindex){
    return_header('/articles/list/');
}
pageconfig([
    'TITLE' => '記事一覧 | '.APP_NAME,
    'INDEX' => 'articles-list',
    'ALIAS' => '記事一覧'
]);

include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
    <div id="maincontainer">
        <h2><?=\App::get('ALIAS')?></h2>
        <hr>
        <div id="artlists">
<?php
$pjart = Display::articles_index($limit, $offset);
if(empty($pjart)){?>
        <div class="artContainer" style="background-color:<?=$pj['color']?>;">
            <div class="artThumb" style="background-color:#eee;"></div>
            <div class="text">
                <h3 style="text-decoration:underline;">まだ記事がありません。ごめんね😢</h3>
                <p></p>
            </div>
        </div>
        <!-- <hr> -->
<?php }
foreach($pjart as $art){?>
        <a class="artContainer" href="<?=HOME_URL.'/articles/page/?id='.$art['id']?>" style="background-color:<?=$art['color']?>;">
            <div class="artThumb" style="background-image:url(<?=IMAGE_URL.'/main/article/'.$art['thumbnail']?>);"></div>
            <div class="text">
                <h3 style="text-decoration:underline;"><?=dispStrPur($art['title'], 35)?></h3>
                <p><em><?=jpformatWest($art['date'])?></em> <span>#<?=$art['category']?></span></p>
                <p><?=dispStrPur($art['main'], 30)?></p>
            </div>
        </a>
        <!-- <hr> -->
<?php }
?>
        </div>
        <hr>
        <div id="pagenav">
<?php if($index === 1){?>
            <a href="<?=$srchurl?>?index=<?=$index?>" style="font-weight: bold;" class="isPage"><?=$index?></a>
    <?php if($lastkey > $limit){?>
            <a href="<?=$srchurl?>?index=<?=$index+1?>"><?=$index+1?></a>
        <?php if($lastindex !== 2){?>
            ...<a href="<?=$srchurl?>?index=<?=$lastindex?>"><?=$lastindex?></a>
        <?php }?>
    <?php }?>
<?php }elseif($index == $lastindex){?>
            <a href="<?=$srchurl?>">1</a>
    <?php if($index -1 != 1){?>
            ... <a href="<?=$srchurl?>?index=<?=$index-1?>"><?=$index-1?></a>
    <?php }?>
            <a href="<?=$srchurl?>?index=<?=$index?>" class="isPage"><?=$index?></a>
<?php }else{?>
        <a href="<?=$srchurl?>">1</a>
    <?php if($index != 2){?>
        ... <a href="<?=$srchurl?>?index=<?=$index-1?>"><?=$index-1?></a>
    <?php }?>
        <a href="<?=$srchurl?>?index=<?=$index?>" class="isPage"><?=$index?></a>
    <?php if($index != $lastindex -1){?>
        <a href="<?=$srchurl?>?index=<?=$index+1?>"><?=$index+1?></a> ...
    <?php }?>
        <a href="<?=$srchurl?>?index=<?=$lastindex?>"><?=$lastindex?></a>
<?php }?>
        </div>
    </div>
</div>
<?php include_once(VIEW_DIR.'/foot-nav.php');?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');