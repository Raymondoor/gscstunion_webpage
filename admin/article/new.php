<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Project;
use Raymondoor\Model\Category;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
use function Raymondoor\Func\jpyear;

UserAuth::admin_gate();
pageconfig([
    'TITLE' => '記事投稿 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-article-new',
    'ALIAS' => '記事投稿'
]);
$pj = Project::all();
ob_start();
foreach($pj as $p){?>
<option value="<?=$p['id']?>"><?=$p['name']?></option>
<?php }
$pjoption = ob_get_clean();

$cats = Category::all();
ob_start();
foreach($cats as $c){?>
<option value="<?=$c['id']?>">#<?=$c['name']?></option>
<?php }
$catoption = ob_get_clean();
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-article.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <div id="newart">
        <?=htmlmessage()?>
        <form action="<?=POST_URL?>new-article" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" id="new-article-form">
            <div id="textbits">
                <?=csrf_form('login')?>
                <label>タイトル：</label>
                <span class="pure-form-message">必須</span>
                <input type="text" placeholder="例：<?=jpyear()?>年度○○を開催しました" required class="pure-input-1 newTitle" name="title" id="title">
                <div class="comboForm">
                    <div class="comboFormEl">
                        <label>プロジェクト：</label>
                        <span class="pure-form-message">一つ選択してください。</span>
                        <select id="projectOption" class="pure-input-1" name="project" required>
                            <option value="">--（必須）</option>
                            <?=$pjoption?>
                        </select>
                    </div>
                    <div class="comboFormEl">
                        <label>日付：</label>
                        <span class="pure-form-message">今日の日付です。</span>
                        <input type="date" required class="pure-input-1" name="date" readOnly="" value="<?=date('Y-m-d')?>">
                    </div>
                </div>
                <br>
                <div class="comboForm" id="categoryForm">
                    <div class="comboFormEl">
                        <label>カテゴリ（ハッシュタグ）：</label>
                        <span class="pure-form-message">検索は次より行ってください。</span>
                        <select id="categoryOption" class="pure-input-1" name="category">
                            <option value="">--（必須）</option>
                            <?=$catoption?>
                        </select>
                    </div>
                    <div class="comboFormEl">
                        <label>検索&新規</label>
                        <span class="pure-form-message">“#”は記入不要です。</span>
                        <input type="text" placeholder="検索&新規" class="pure-input-1" name="newcategory" id="newcat">
                        <div id="newcatresult" class="pure-u-1"></div>
                    </div>
                </div>
            <label>表紙画像：</label>
            <label id="imageInput">
                <input title="Drop image or click me" type="file" accept="image/*" id="imageInputTr" name="thumbnail">
            </label>
            </div>
            <div id="mainBits">
            <label>本文：</label>
            <input type="hidden" required name="main" id="hiddenMain">
            <div id="quillWrapper"><div id="editor"></div></div>
            </div>
            <span class="pure-form-message">投稿前にプレビューを活用してください。プレビューはこの下に表示されます。</span><br>
            <input type="submit" value="投稿" class="pure-button pure-button-primary" id="submitBtn">
            <button type="button" class="pure-button pure-button-primary" id="prvbtn" onclick="preview()">プレビュー</button>
        </form>
        <div id="prvdiv"></div>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');