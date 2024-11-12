<?php
header('Content-Type: text/html; charset=utf-8');
$SEO = list_seo();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- Primary tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="<?= $SEO['Keywords'] ?>" />
    <meta name="description" content="<?= $SEO['Description'] ?>" />
    <!-- Open graph / Facebook -->
    <meta property="og:title" content="<?= $title; ?>">
    <meta property="og:description" content="<?= $SEO['Description'] ?>">
    <meta property="og:image" content="<?= APP_LINK . IMAGES_LINK; ?>/icon/GSC_logo.png" />
    <meta property="og:url" content="<?= APP_LINK . $_SERVER['REQUEST_URI']?>" />
    <meta property="og:site_name" content="<?= $SEO['Organization'] ?>" />
    <meta property="og:type" content="website" />
    <!-- X / Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title; ?>">
    <meta name="twitter:description" content="<?= $SEO['Description'] ?>">
    <meta name="twitter:image" content="<?= APP_LINK . IMAGES_LINK; ?>/icon/GSC_logo.png" />

<?php if($file == "HOME" || $file == "ARTICLES") { ?>
    <meta name="google-site-verification" content="HEqZhtsd512Z-yqCVwc5-d8iAnR-wA0n_cJv3Bjlkak" />
    <meta name="msvalidate.01" content="BFFBEAF9A3D335C1BB2266489621DD53" />
<?php }; ?>

    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= APP_LINK . STYLE_LINK; ?>/style.css">
    <link rel="icon" href="<?= APP_LINK . IMAGES_LINK; ?>/icon/favicon.ico" type="image/x-icon">
    <link rel="preload" href="<?= APP_LINK . FONT_LINK; ?>/NotoSerifJP-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?= APP_LINK . FONT_LINK; ?>/MPLUSRounded1c-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">

</head>
<body>
<header>
    <div id="h_title">
        <!-- GSC学生連合 -->
    </div>
    <nav id="navbar">
        <div id="rel_link">
            <p><a href="<?= $root; ?>">HOME</a></p>
            <p><a href="<?= $root; ?>articles/">ARTICLES</a></p>
        </div>
        <div id="sns_link">
            <a href="<?= $SEO['SNS']['IG']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['IG']['Title'] ?>"><img src="<?= $root . IMAGES_LINK; ?>/icon/Instagram.png" alt="<?= $SEO['SNS']['IG']['Title'] ?>" class="sns_image"></a>
            <a href="<?= $SEO['SNS']['X']['Link'] ?>" target="_blank" title="<?= $SEO['SNS']['X']['Title'] ?>"><img src="<?= $root . IMAGES_LINK; ?>/icon/X.png" alt="<?= $SEO['SNS']['X']['Title'] ?>" class="sns_image"></a>
        </div>
    </nav>
    <hr>
</header>