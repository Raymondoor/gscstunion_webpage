<?php require_once(__DIR__.'/../../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Sns;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\return_header;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
UserAuth::admin_gate();
if(!$_SESSION[APP_NAME]['user']['super']){
    return_header('/admin/');
}
pageconfig([
    'TITLE' => 'SNS | 管理 | '.APP_NAME,
    'INDEX' => 'admin-content-sns',
    'ALIAS' => 'SNS'
]);
$sns = Sns::all();

include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php
include_once(VIEW_DIR.'/adm-nav.php');
include_once(VIEW_DIR.'/adm-nav-content.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <div id="newsns">
        <h3>新規登録</h3>
        <ins><?=htmlmessage()?></ins>
        <form action="<?=POST_URL?>new-sns" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" id="new-project-form">
            <div id="textbits">
                <?=csrf_form('newsns')?>
                <div class="comboForm">
                    <div class="comboFormEl">
                        <label>名前：</label>
                        <input type="text" placeholder="例：YouTube" required class="pure-input-1" name="name" id="name">
                    </div>
                    <div class="comboFormEl">
                        <label>ユーザー名：</label>
                        <input type="text" placeholder="例：@<?=$BASE['Alias']?>" required class="pure-input-1" name="username">
                    </div>
                </div>
                <label>リンク：</label>
                <input type="url" placeholder="例：https://www.youtube.com/@<?=strtolower($BASE['Alias'])?>" required class="pure-input-1" name="link">
            </div>
            <label>アイコン（黒）：</label>
            <label id="imageInput">
                <input title="Drop image or click me" type="file" accept="image/*" id="imageInputTr" name="icon">
            </label>
            <input type="submit" value="登録" class="pure-button pure-button-primary">
        </form>
        <br>
        <hr>
        <div id="delete">
            <h3>削除</h3>
            <p>「削除」を選択した項目はそのまま確認無く削除されます。注意してください。</p>
            <div id="snslists">
<?php foreach($sns as $acc){?>
                <form action="<?=POST_URL?>delete-sns" method="post" class="post">
                    <input type="hidden" name="id" value="<?=$acc['id']?>">
                    <div class="details">
                        <h4><?=$acc['name']?></h4>
                        <p><?=$acc['username']?></p>
                    </div>
                    <input type="submit" value="削除" class="pure-button button-error">
                </form>
<?php }?>
            </div>
        </div>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
