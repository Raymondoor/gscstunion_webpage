<footer>
    <div id="f-links">
        <div id="f-main-link">
            <p><a href="https://www.aoyama.ac.jp/faculty/gsc/">地球社会共生学部&#8663</a></p><br>
            <p><a href="https://www.aoyama.ac.jp/">青山学院大学&#8663</a></p>
        </div>
        <div id="f-access">
            <p><a href="https://www.openstreetmap.org/way/72302039" target="_blank">
                〒252-5258<br> 
                神奈川県相模原市中央区<br>
                淵野辺 5-10-1&#8663
            </a></p>
        </div>
    </div>
    <br>
    <div id="fnavbar">
        <div id="license">
            GSC 学生連合<br>
            <?= date("Y"); ?> &#169 All rights reserved
        </div>
        <div id="f-sns-link">
            <a href="<?= $SEO['SNS']['IG']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['IG']['Title'] ?>"><img src="<?= $root . IMAGES_LINK; ?>/share/Instagram.png" alt="<?= $SEO['SNS']['IG']['Title'] ?>" class="sns_image"></a>
            <a href="<?= $SEO['SNS']['X']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['X']['Title'] ?>"><img src="<?= $root . IMAGES_LINK; ?>/share/X.png" alt="<?= $SEO['SNS']['X']['Title'] ?>" class="sns_image"></a>
        </div>
    </div>
    <div id="back2top">
        <button id="b2t" title="ページの先頭に戻る"><img src="<?= $root . IMAGES_LINK; ?>/share/uparrow.png" alt="ページの先頭に戻る" id="b2timg"></button>
    </div>
    <div id="login">
<?php if (isset($_SESSION['user']) && strpos($file, 'ADMIN') === false) { ?>
    <a href="<?= $root ?>admin/">管理者用ページ</a><?= PHP_EOL ?>
<?php } elseif (ip_in_range($_SERVER['REMOTE_ADDR'], NETWORK_RANGE) && strpos($file, 'ADMIN') === false) { ?>
    <a href="<?= $root ?>admin/login.php">管理者用ページにログイン</a><?= PHP_EOL ?>
<?php } ?>
    </div>
</footer>
    <script src="<?= APP_URL . SCRIPT_LINK; ?>/index.js"></script>
    <?php 
    // call a specific script for each directory or page
    function loadScript($file) {
        global $root;
        switch ($file) {
            case 'HOME':
                echo '<script src="' . APP_URL . SCRIPT_LINK . '/lib/HOME.js"></script>' . PHP_EOL;
                break;
            case 'ARTICLES':
                echo '<script src="' . APP_URL . SCRIPT_LINK . '/lib/ARTICLES.js"></script>' . PHP_EOL;
                break;
            case 'ADMIN':
                echo "";
                break;
            case 'login':
                echo "";
                break;
        }
    }
    loadScript($file);
if ($file == 'HOME' || $file == 'ARTICLES') {
    ob_start();
?>
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "EducationalOrganization",
    "name": "<?= $SEO['Organization'] ?>",
    "alternateName": "<?= $SEO['Alias'] ?>",
    "url": "<?= APP_URL . $_SERVER['REQUEST_URI']?>",
    "logo": "<?= APP_URL . IMAGES_LINK; ?>/icon/GSC_logo.png",
    "description": "<?= $SEO['Description'] ?>",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?= $SEO['Location']['Street'] ?>",
        "addressLocality": "<?= $SEO['Location']['City'] ?>",
        "addressRegion": "<?= $SEO['Location']['Prefecture'] ?>",
        "postalCode": "<?= $SEO['Location']['Post'] ?>",
        "addressCountry": "<?= $SEO['Location']['Country-Code'] ?>"
    }
}
</script>
<?php
    echo ob_get_clean();
} ?>
</body>
</html>