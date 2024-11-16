<?php
header('Content-Type: text/html; charset=utf-8');
$SEO = list_seo();
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- Primary tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="<?= $SEO['Keywords'] ?>" />
    <meta name="description" content="<?= $SEO['Description'] ?>" />
<?php if(strpos($file, 'ADMIN') === false) { ?>
    <!-- Open graph / Facebook -->
    <meta property="og:title" content="<?= $title; ?>">
    <meta property="og:description" content="<?= $SEO['Description'] ?>">
    <meta property="og:image" content="<?= APP_URL . IMAGES_LINK; ?>/brand/GSC_logo.png" />
    <meta property="og:url" content="<?= APP_URL . $_SERVER['REQUEST_URI']?>" />
    <meta property="og:site_name" content="<?= $SEO['Organization'] ?>" />
    <meta property="og:type" content="website" />
    <!-- X / Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title; ?>">
    <meta name="twitter:description" content="<?= $SEO['Description'] ?>">
    <meta name="twitter:image" content="<?= APP_URL . IMAGES_LINK; ?>/brand/GSC_logo.png" />

<?php }; ?>
<?php if($file == "HOME" || $file == "ARTICLES") { ?>
    <meta name="google-site-verification" content="HEqZhtsd512Z-yqCVwc5-d8iAnR-wA0n_cJv3Bjlkak" />
    <meta name="msvalidate.01" content="BFFBEAF9A3D335C1BB2266489621DD53" />
<?php }; ?>

    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= APP_URL . STYLE_LINK; ?>/style.css">
<?php if ($file == 'HOME') { ?>
    <link rel="stylesheet" href="<?= APP_URL . STYLE_LINK; ?>/lib/HOME.css">
<?php } elseif ($file == 'ARTICLES') { ?>
    <link rel="stylesheet" href="<?= APP_URL . STYLE_LINK; ?>/lib/ARTICLES.css">
<?php } elseif ($file == 'PAGE') { ?>
        <link rel="stylesheet" href="<?= APP_URL . STYLE_LINK; ?>/lib/PAGE.css">
<?php } elseif ($file == 'ADMIN-ARTICLES-NEW') { ?>
    <link rel="stylesheet" href="<?= APP_URL . STYLE_LINK; ?>/lib/ADMIN-ARTICLES-NEW.css">
<?php } elseif ($file == 'ADMIN-DEV') { ?>
    <link rel="stylesheet" href="<?= APP_URL . STYLE_LINK; ?>/lib/ADMIN-DEV.css">
<?php } ?>
    <link rel="icon" href="<?= APP_URL . IMAGES_LINK; ?>/brand/GSC_logo.png" type="image/x-icon">
    <link rel="preload" href="<?= APP_URL . FONT_LINK; ?>/NotoSerifJP-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?= APP_URL . FONT_LINK; ?>/MPLUSRounded1c-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">

</head>
<body>
<header>
    <div id="h_title">
    </div>
    <nav id="navbar">
        <div id="rel_link">
            <p><a href="<?= $root; ?>">HOME</a></p>
            <p><a href="<?= $root; ?>articles/">ARTICLES</a></p>
        </div>
        <div id="sns_link">
            <a href="<?= $SEO['SNS']['IG']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['IG']['Title'] ?>"><img src="<?= $root . IMAGES_LINK; ?>/share/Instagram.png" alt="<?= $SEO['SNS']['IG']['Title'] ?>" class="sns_image"></a>
            <a href="<?= $SEO['SNS']['X']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['X']['Title'] ?>"><img src="<?= $root . IMAGES_LINK; ?>/share/X.png" alt="<?= $SEO['SNS']['X']['Title'] ?>" class="sns_image"></a>
        </div>
    </nav>
    <hr>
</header><?= PHP_EOL;