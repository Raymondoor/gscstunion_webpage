<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- Primary tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="GSC, gscstunion, 学連, 地球社会共生学部, 青学, 春から青学, 春から地球, 相模原キャンパス">
    <meta name="description" content="地球社会共生学部公認の団体「学生連合」は、学部の魅力を学生目線から高める団体です。盛んな学部生交流の機会や、学生主体の学びを提供するイベント企画を通し、学部が目指す「より良い地球社会創出」の一翼を担います。">
    <!-- Open graph / Facebook -->
    <meta property="og:title" content="<?= $pageTitle; ?>">
    <meta property="og:description" content="地球社会共生学部公認の団体「学生連合」は、学部の魅力を学生目線から高める団体です。盛んな学部生交流の機会や、学生主体の学びを提供するイベント企画を通し、学部が目指す「より良い地球社会創出」の一翼を担います。">
    <meta property="og:image" content="<?= $dir_back; ?>assets/images/icon/GSC_logo.png" />
    <meta property="og:url" content="https://www.cc.aoyama.ac.jp/~gscstunion/" />
    <meta property="og:site_name" content="GSC 学生連合" />
    <meta property="og:type" content="website" />
    <!-- X / Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $pageTitle; ?>">
    <meta name="twitter:description" content="地球社会共生学部公認の団体「学生連合」は、学部の魅力を学生目線から高める団体です。盛んな学部生交流の機会や、学生主体の学びを提供するイベント企画を通し、学部が目指す「より良い地球社会創出」の一翼を担います。">
    <meta name="twitter:image" content="<?= $dir_back; ?>assets/images/icon/GSC_logo.png" />

<?php if($dir == "home" || $dir == "articles") { ?>
    <meta name="google-site-verification" content="HEqZhtsd512Z-yqCVwc5-d8iAnR-wA0n_cJv3Bjlkak" />
    <meta name="msvalidate.01" content="BFFBEAF9A3D335C1BB2266489621DD53" />
<?php }; ?>

    <title><?= $pageTitle; ?></title>
    <link rel="stylesheet" href="<?= $dir_back; ?>assets/css/style.css">
    <link rel="icon" href="<?= $dir_back; ?>assets/images/icon/favicon.ico" type="image/x-icon">
    <link rel="preload" href="<?= $dir_back; ?>assets/fonts/NotoSerifJP-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?= $dir_back; ?>assets/fonts/MPLUSRounded1c-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">

</head>
<body>
    <header>
        <div id="h_title">
            <!-- <h1>GSC Stunion</h1> -->
        </div>
        <nav id="navbar">
            <div id="rel_link">
                <p><a href="<?= $dir_back; ?>">HOME</a></p>
                <p><a href="<?= $dir_back; ?>articles/">ARTICLES</a></p>
            </div>
            <div id="sns_link">
                <a href="<?= $Instagram; ?>" target="_blank" title="Instagram"><img src="<?= $dir_back; ?>assets/images/icon/Instagram.png" alt="Instagram" class="sns_image"></a>
                <a href="<?= $X; ?>" target="_blank" title="X(Twitter)"><img src="<?= $dir_back; ?>assets/images/icon/X.png" alt="X(Twitter)" class="sns_image"></a>
            </div>
        </nav>
        <hr>
    </header>