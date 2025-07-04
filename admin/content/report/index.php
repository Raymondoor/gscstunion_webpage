<?php require_once(__DIR__.'/../../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Report;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\return_header;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
use function Raymondoor\Func\jpyear;

UserAuth::admin_gate();
if(!$_SESSION[APP_NAME]['user']['super']){
    return_header('/admin/');
}
pageconfig([
    'TITLE' => '年次報告 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-content-report',
    'ALIAS' => '年次報告'
]);

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
        <form action="<?=POST_URL?>new-report" method="post" class="pure-form pure-form-stacked" id="new-project-form">
            <div id="textbits">
                <?=csrf_form('newsns')?>
                <div class="comboForm">
                    <div class="comboFormEl">
                        <label>年度：</label>
                        <input type="number" required class="pure-input-1" name="year" id="year" min="2015" max="<?=date('Y') + 2?>" value="<?=jpyear()-1?>">
                    </div>
                    <div class="comboFormEl">
                        <label>形式：</label>
                        <select required class="pure-input-1" name="type">
                            <option value="">--（必須）</option>
                            <option value="1">今年度報告書</option>
                            <option value="2">今年度決算書</option>
                            <option value="3">次年度計画書</option>
                            <option value="4">次年度予算案</option>
                            <option value="5">その他</option>
                        </select>
                    </div>
                </div>
                <label>タイトル：</label>
                <input type="text" placeholder="例：<?=jpyear()?>年度_青山学院大学地球社会共生学部学生連合_年次報告書" required class="pure-input-1" name="title" id="title">
                <label>リンク：</label>
                <input type="url" placeholder="例：https://drive.google.com/file/d/identifier/view?usp=drive_link" required class="pure-input-1" name="link">
            </div>
            <input type="submit" value="登録" class="pure-button pure-button-primary">
        </form>
        <br>
        <hr>
        <div id="delete">
            <h3>削除</h3>
            <p>「削除」を選択した項目はそのまま確認無く削除されます。注意してください。</p>
            <div id="reportlists">
<?php 
$rp = Report::all();
$inorder = [];
foreach($rp as $report){
    $inorder[$report['year']][$report['type']] = ['id' => $report['id'], 'title' => $report['title'], 'link' => $report['link']];
}
krsort($inorder);
?>
<?php foreach($inorder as $report => $values){
    echo '<h4>'.$report.'年度</h4>';
    ksort($values, SORT_NUMERIC);
foreach($values as $value){?>
    <form action="<?=POST_URL?>delete-report" method="post" class="post">
        <input type="hidden" name="id" value="<?=$value['id']?>">
        <h4><a href="<?=$value['link']?>"><?=$value['title']?></a></h4>
        <input type="submit" value="削除" class="pure-button button-error">
    </form>
<?php }} ?>
        </div>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
