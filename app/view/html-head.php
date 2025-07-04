<?php header('Content-Type: text/html; charset=utf-8');
// Disable caching
// header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");
use Raymondoor\Controller\BaseController;
use function Raymondoor\Func\indexAre;
use function Raymondoor\Func\indexIs;
use function Raymondoor\Func\loadAsset;

$BASE = BaseController::get();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <?php // robots ?>
    <?=indexAre('admin')?'<meta name="robots" content="noindex,nofollow,noarchive">':'';?>
    <?=indexIs('404')?'<meta name="robots" content="noindex">':'';?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=\App::get('TITLE')?></title>

<?php if(!indexAre('admin')){?>
    <meta name="keywords" content="<?=$BASE['Keywords']?>" />
    <meta name="description" content="<?=$BASE['Description']?>" />
    <meta property="og:title" content="<?=\App::get('TITLE')?>">
    <meta name="twitter:title" content="<?=\App::get('TITLE')?>">
    <meta property="og:image" content="<?=IMAGE_URL?>/brand/logo2.jpg" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="<?=IMAGE_URL?>/brand/logo2.jpg" />
    <meta property="og:url" content="<?=CURRENT_URL?>" />
    <meta name="google-site-verification" content="<?=$BASE['Google-SEO']?>" />
    <meta name="msvalidate.01" content="<?=$BASE['Bing-SEO']?>" />
<?php }?>
<?php
    if(indexIs('article')){?>
    <meta property="og:type" content="article" />
<?php }else{?>
    <meta property="og:type" content="website" />
<?php }?>

    <link rel="icon" href="<?=IMAGE_URL?>/brand/logo2.jpg" type="image/jpg" />
    <link rel="stylesheet" href="<?=STYLE_URL?>/pure-min.css" />
    <?php include_once(PUBLIC_DIR.'/asset/style/style.css.php');?>
    <?php if(indexAre('admin'))include_once(PUBLIC_DIR.'/asset/style/template/admin.css.php');?>
    <?=loadAsset('style')?>
</head>
