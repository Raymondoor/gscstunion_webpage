<?php header('Content-Type: text/html; charset=utf-8; Content-Security-Policy: script-src "self" frame-src "self";');
$SEO = load_seo();
$SNS = load_sns();
$content = load_content();
if($file == 'HOME'){
    $title .= '【公式】'.$SEO['Organization'].' | '.$SEO['Faculty'].' | '.$SEO['School'];
}elseif($file == 'ARTICLE'){
    $title .= ' | '.$project['pName'].' | '.$SEO['Organization'];
}else{
    $title .= ' | '.$SEO['Organization'];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title><?=$title?></title>
    <link rel="icon" href="<?=IMAGES_URL?>/brand/logo2.jpg" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if(strpos($file,'ADMIN') === false){
    ob_start()?>
    <!-- cards, seo, etc -->
    <meta name="keywords" content="<?=$SEO['Keywords']?>" />
    <meta name="description" content="<?=$SEO['Description']?>" />
    <meta property="og:title" content="<?=$title?>">
    <meta name="twitter:title" content="<?=$title?>">
    <meta property="og:image" content="<?=IMAGES_URL?>/brand/logo2.jpg" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="<?=IMAGES_URL?>/brand/logo2.jpg" />
    <meta property="og:url" content="<?=APP_URL.$_SERVER['REQUEST_URI']?>" />
    <meta name="google-site-verification" content="<?=$SEO['Google-SEO']?>" />
    <meta name="msvalidate.01" content="<?=$SEO['Bing-SEO']?>" />
<?php
    if($file == 'ARTICLE'){?>
    <meta property="og:type" content="article" />
<?php
    }else{?>
    <meta property="og:type" content="website" />
<?php
    };
    ob_end_flush();
};echo PHP_EOL?>
    <!-- style -->
    <link rel=stylesheet href="<?=STYLE_URL?>/style.css" />
    <link rel=stylesheet href="<?=STYLE_URL.'/lib/'.$file.'.css'?>" />
    <?php if($file == 'ADMIN-ARTICLE-NEW'){?>
    <link href="<?=STYLE_URL?>/quill.snow.css" rel="stylesheet" />
    <?php }?>
</head>
