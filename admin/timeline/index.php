<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Timeline;

use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\htmlmessage;
UserAuth::admin_gate();

$namearr = explode(' ', $_SESSION[APP_NAME]['user']['name']);
if(isset($namearr[1])){
    $initial = strtoupper(substr($namearr[1], 0,1)).strtolower(substr($namearr[1], 1)).' '.substr($namearr[0], 0,1);
}else{
    $initial = APP_NAME;
}
$timeline = Timeline::all();
$ord = '';
pageconfig([
    'TITLE' => 'タイムライン | 管理 | '.APP_NAME,
    'INDEX' => 'admin-timeline',
    'ALIAS' => 'タイムライン管理'
]);

include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <div id="content">
        <div id="new">
            <h3>追加</h3>
            <ins><?=htmlmessage()?></ins>
            <form action="<?=POST_URL?>new-timeline" method="post" class="pure-form pure-form-stacked">
                <label for="newauthor">投稿者：</label>
                <input type="text" name="author" id="newauthor" required maxlength="24" class="pure-input-2-3" value="<?=$initial?>">
                <label for="newdate">日付：</label>
                <input type="text" name="date" id="newdate" class="pure-input-1-2" value="<?=date('Y-m-d')?>" readonly>
                <label for="newmessage">メッセージ：</label>
                <span class="pure-form-message">最大200字まで。</span>
                <input type="text" name="message" class="pure-input-1" id="newmessage" maxlength="200">
                <input type="submit" value="投稿" class="pure-button pure-button-primary">
            </form>
        </div>
        <hr>
        <div id="delete">
            <h3>削除</h3>
            <p>「削除」を選択した項目はそのまま確認無く削除されます。</p>
<?php foreach($timeline as $post){
    $date = explode(' ',$post['created_at']);
    $ord = $ord ==='odd'?'even':'odd';?>
    <form action="<?=POST_URL?>delete-timeline" method="post" class="post <?=$ord?>">
        <input type="hidden" name="id" value="<?=$post['id']?>">
        <div class="details">
            <h4><?=$post['name']?></h4>
            <p><?=$post['message']?></p>
        </div>
        <input type="submit" value="削除" class="pure-button button-error">
    </form>
<?php }?>
        </div>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');