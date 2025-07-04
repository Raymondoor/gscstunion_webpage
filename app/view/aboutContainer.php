<?php require_once(__DIR__.'/../../vendor/autoload.php');
use function Raymondoor\Func\indexIs;
use function Raymondoor\Func\indexAre;
$aboutURL = HOME_URL.'/about';
?>
<style>
@import url("<?=STYLE_URL?>/template/ql-render.css");
#content{
    display: flex;
    justify-content: space-between;
}
#content #aboutContent{
    width: 100%;
}
#content #aboutContent #prvdiv{
    margin: 2rem auto 5rem auto;
    width: clamp(280px, 85%, 1000px);
    max-width: 1000px;
    word-wrap: break-word;
    font-family: var(--KakuFont);
    h2,h3{margin:0.875rem 0;}
    h2{font-size:clamp(1.25rem,3vw,1.75rem);}
    h3{font-size:clamp(1rem,2.25vw,1.25rem);}
    p{margin:1rem 0.5rem;}
    p{min-height:1rem;letter-spacing:1px;font-size:clamp(0.875rem,2vw,1rem);}
    img{max-width:99%;max-height:16rem;margin:0.25rem 0.1rem;}
    .ql-size-large{font-size:clamp(1.75rem,3.5vw,2.5rem);font-family:"Zen Min";text-shadow:1px 1px 1px #000;color:#444;}
    .ql-size-small{font-size:clamp(0.75rem,1.875vw,0.875rem);}
}
#content #about-nav{
    display:block;
    background-position:center;
    background-size:cover;
    padding:0.5rem;
    background-image:url("<?=IMAGE_URL?>/main/aboutnav.jpg");
    min-width:fit-content;
    ul{padding:1rem 2rem 0 1rem;margin:0;}
    li{list-style:none;}
    a{
        display:inline-block;
        color:#eee;
        text-decoration:none;
        font-family:var(--KakuFont);
        font-size:clamp(0.875rem, 2vw, 1rem);
        padding:0.375rem 0;
    }
    a:hover{color:#fff;}
    .isAbout{
        color:#fff;
        text-decoration:underline;
    }
}
@media(max-width:680px){
    #content{display: block;}
    #content #about-nav{
        ul{
            padding: 0 0.5rem;
        }
        a{
            padding: 0.25rem 0;
        }
    }
}
</style>
<div id="aboutContent">
<div id="prvdiv">
<?php
$base = DATA_DIR.'/content/'.\APP::get('INDEX');
foreach(['.html', '.php'] as $ext){
    @include_once($base . $ext);
}?>
<pre></pre>
</div>
</div>
<div id="about-nav">
    <ul>
        <li><a href="<?=$aboutURL?>/" class="<?=indexIs('about')?'isAbout':''?>">私たちについて</a></li>
        <li><a href="<?=$aboutURL?>/social/" class="<?=indexIs('about-social')?'isAbout':''?>">ソーシャル</a></li>
        <li><a href="<?=$aboutURL?>/outlink/" class="<?=indexIs('about-xlink')?'isAbout':''?>">外部リンク</a></li>
        <li><a href="<?=$aboutURL?>/report/" class="<?=indexIs('about-report')?'isAbout':''?>">年次報告</a></li>
        <li><a href="<?=$aboutURL?>/location/" class="<?=indexIs('about-location')?'isAbout':''?>">所在地</a></li>
        <li><a href="<?=$aboutURL?>/policy/" class="<?=indexIs('about-policy')?'isAbout':''?>">各種方針</a></li>
        <li><a href="<?=$aboutURL?>/license/" class="<?=indexIs('about-license')?'isAbout':''?>">規約・ライセンス</a></li>
        <li><a href="<?=$aboutURL?>/contact/" class="<?=indexIs('about-contact')?'isAbout':''?>">お問い合わせ</a></li>
    </ul>
</div>
