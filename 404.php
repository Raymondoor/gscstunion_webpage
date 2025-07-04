<?php require_once(__DIR__.'/vendor/autoload.php');
use function Raymondoor\Func\pageconfig;
pageconfig([
    'TITLE'=>'お探しのページが見つかりませんでした。',
    'INDEX'=>'404',
    'ALIAS'=>'404'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main style="justify-items:center;align-content:center">
<h1 style="text-align:center;font-size: clamp(0.75rem, 3.75vw, 2rem);">404<br>お探しのページが見つかりませんでした。&#x1F622</h1>
<h3 style="text-align:center;font-size: clamp(0.75rem, 3.75vw, 1.5rem);"><a href="<?=HOME_URL?>/" style="color:cadetblue">ホームに戻る</a></h3>
</main>
<?php include_once(VIEW_DIR.'/html-footer.php');