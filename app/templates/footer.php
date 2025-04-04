<footer>
    <hr>
    <div id="f-main">
        <div id="f-navigation" class="f-links">
            <h3>NAVIGATION</h3>
            <ul>
                <li><a href="<?=APP_URL?>/">ホーム</a></li>
                <li><a href="<?=APP_URL?>/projects/">プロジェクト</a></li>
                <li><a href="<?=APP_URL?>/articles/">記事</a></li>
                <li><a href="<?=APP_URL?>/timeline/">タイムライン</a></li>
                <li><a href="<?=APP_URL?>/archive/">アーカイブ</a></li>
                <li><a href="<?=APP_URL?>/about/">私たちについて</a></li>
            </ul>
        </div>
        <div id="f-information" class="f-links">
            <h3>INFORMATION</h3>
            <ul>
                <li><a href="<?=APP_URL?>/about/sns/">ソーシャルメディア</a></li>
                <li><a href="<?=APP_URL?>/about/outlink/">外部リンク</a></li>
                <li><a href="<?=APP_URL?>/about/report/">年次報告</a></li>
                <li><a href="<?=APP_URL?>/about/location/">所在地</a></li>
                <li><a href="<?=APP_URL?>/about/policy/">各種方針</a></li>
                <li><a href="<?=APP_URL?>/about/license/">利用規約・ライセンス</a></li>
                <li><a href="<?=APP_URL?>/about/contact/">お問い合わせ</a></li>
            </ul>
        </div>
    </div>
    <hr>
    <div id="f-bottom">
        <div id="f-cred">
            <p>&#169 <?=date("Y").' '.$SEO['Organization'].PHP_EOL?></p>
        </div>
        <a href="<?=APP_URL?>/"><div id="f-logo"></div></a>
    </div>
    <hr>
</footer>
<div id="varaety"></div>
    <script src="<?=SCRIPT_URL?>/index.js"></script>
    <script src="<?=SCRIPT_URL?>/jquery-3.7.1.min.js"></script>
    <script src="<?=SCRIPT_URL?>/anime.min.js"></script>
<?php if($file == 'ADMIN-ARTICLE-NEW'){?>
    <script src="<?=SCRIPT_URL?>/quill.js"></script>
<?php }?>
    <script src="<?=SCRIPT_URL.'/lib/'.$file.'.js'?>"></script>
    <?php if(file_exists(SCRIPT_DIR.'/'.$file.'.php')){
        require_once(SCRIPT_DIR.'/'.$file.'.php');
    }
if ($file == 'HOME' || $file == 'PROJECTS') {
    ob_start();
?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "EducationalOrganization",
    "name": "<?=$SEO['Organization']?>",
    "alternateName": "<?=$SEO['Alias']?>",
    "url": "<?=APP_URL . $_SERVER['REQUEST_URI']?>",
    "logo": "<?=IMAGES_URL?>/icon/GSC_logo.png",
    "description": "<?=$SEO['Description']?>",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?=$SEO['Location']['Street']?>",
        "addressLocality": "<?=$SEO['Location']['City']?>",
        "addressRegion": "<?=$SEO['Location']['Prefecture']?>",
        "postalCode": "<?=$SEO['Location']['Post']?>",
        "addressCountry": "<?=$SEO['Location']['Country-Code']?>"
    }
}
</script>
<?php
    ob_end_flush();
}?>
</body>
</html>