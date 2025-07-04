<?php require_once(__DIR__.'/../vendor/autoload.php');
use Raymondoor\Model\Timeline;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\dynamic_date_disp;
use function Raymondoor\Func\jpformatWest;
$timeline = Timeline::timeline_index(10);
pageconfig([
    'TITLE'=>'タイムライン | '.APP_NAME,
    'INDEX'=>'timeline',
    'ALIAS'=>'タイムライン'
]);
$ord = '';
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
    <h1 class="subHeading"><?=\App::get('ALIAS')?></h1>
    <div id="timeline">
<?php foreach($timeline as $post){
    $date = explode(' ',$post['created_at']);
    $ord = $ord ==='odd'?'even':'odd';
    ?>
    <div class="post <?=$ord?>">
        <p class="date"><i><?=jpformatWest(dynamic_date_disp($date[0]))?></i></p>
        <p class="author"><?=$post['name']?> より</p>
        <p class="message"><?=$post['message']?></p>
    </div>
<?php }?>
    </div>
<?php include_once(VIEW_DIR.'/foot-nav.php');?>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');