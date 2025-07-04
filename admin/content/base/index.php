<?php require_once(__DIR__.'/../../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\return_header;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
UserAuth::admin_gate();
if(!$_SESSION[APP_NAME]['user']['super']){
    return_header('/admin/');
}
pageconfig([
    'TITLE' => '基本情報 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-content-base',
    'ALIAS' => '基本情報'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php
include_once(VIEW_DIR.'/adm-nav.php');
include_once(VIEW_DIR.'/adm-nav-content.php');?>
<h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
<p id="desc">以下の内容は組織の基本情報として、検索エンジン等が閲覧者に見せるために参考にするものです。</p>
<div id="newart">
<ins><?=htmlmessage()?></ins>
<form action="<?=POST_URL?>base" method="post" class="pure-form pure-form-stacked" id="new-base-form">
    <?=csrf_form('login')?>
        <label for="Organization">組織名:</label>
        <span class="pure-form-message">変更出来ません。変更を行いたい場合は開発者に問い合わせてください。</span>
        <input type="text" value="<?=APP_NAME?>" name="Organization" readonly class="pure-input-1">
        <div class="comboForm">
            <div class="comboFormEl">
                <label for="Alias">通称名:</label>
                <input type="text" value="<?=$BASE['Alias']?>" name="Alias" class="pure-input-1">
            </div>
            <div class="comboFormEl">
                <label for="Members">構成人数:</label>
                <input type="number" value="<?=$BASE['Members']?>" name="Members" min="1" max="500" class="pure-input-1">
            </div>
        </div>
        <div class="comboForm">
            <div class="comboFormEl">
                <label for="Alias">大学名:</label>
                <input type="text" value="<?=$BASE['School']?>" name="School" class="pure-input-1">
            </div>
            <div class="comboFormEl">
                <label for="Alias">学部名:</label>
                <input type="text" value="<?=$BASE['Faculty']?>" name="Faculty" class="pure-input-1">
            </div>
        </div>
        <label for="Keywords">キーワード:</label>
        <span class="pure-form-message">", "で分けて追加してください。</span>
        <input type="text" value="<?=$BASE['Keywords']?>" name="Keywords" class="pure-input-1">
        <label for="Description">説明:</label>
        <input type="text" value="<?=$BASE['Description']?>" name="Description" class="pure-input-1">
        <label for="FoundDate">設立日:</label>
        <div class="comboForm">
            <div class="comboFormEl">
                <span class="pure-form-message">年</span>
                <input type="number" value="<?=$BASE['FoundDate']['Year']?>" name="FoundDate[Year]" min="1" max="<?= date('Y')?>" class="pure-input-1">
            </div>
            <div class="comboFormEl">
                <span class="pure-form-message">月</span>
                <input type="number" value="<?=$BASE['FoundDate']['Month']?>" name="FoundDate[Month]" min="1" max="12" class="pure-input-1">
            </div>
            <div class="comboFormEl">
                <span class="pure-form-message">日</span>
                <input type="number" value="<?=$BASE['FoundDate']['Day']?>" name="FoundDate[Day]" min="1" max="31" class="pure-input-1">
            </div>
        </div>
        <label for="Location">住所:</label>
        <div class="comboForm">
            <div class="comboFormEl">
                <span class="pure-form-message">郵便番号</span>
                <input type="text" value="<?=$BASE['Location']['Post']?>" name="Location[Post]" class="pure-input-1">
            </div>
            <div class="comboFormEl">
                <span class="pure-form-message">国コード</span>
                <input type="text" value="<?=$BASE['Location']['Country-Code']?>" name="Location[Country-Code]" class="pure-input-1">
            </div>
            <div class="comboFormEl">
                <span class="pure-form-message">国</span>
                <input type="text" value="<?=$BASE['Location']['Country']?>" name="Location[Country]" class="pure-input-1">
            </div>
        </div>
        <div class="comboForm">
            <div class="comboFormEl">
                <span class="pure-form-message">都道府県</span>
                <input type="text" value="<?=$BASE['Location']['Prefecture']?>" name="Location[Prefecture]" class="pure-input-1">
            </div>
            <div class="comboFormEl">
                <span class="pure-form-message">市区町村</span>
                <input type="text" value="<?=$BASE['Location']['City']?>" name="Location[City]" class="pure-input-1">
            </div>
        </div>
        <div class="comboForm">
            <div class="comboFormEl">
                <span class="pure-form-message">丁番号</span>
                <input type="text" value="<?=$BASE['Location']['Street']?>" name="Location[Street]" class="pure-input-1">
            </div>
            <div class="comboFormEl">
                <span class="pure-form-message">建物名</span>
                <input type="text" value="<?=$BASE['Location']['Building']?>" name="Location[Building]" class="pure-input-1">
            </div>
        </div>
        <label for="Members">Google Search Console:</label>
        <input type="text" value="<?=$BASE['Google-SEO']?>" name="google" readonly class="pure-input-1">
        <label for="Members">Bing Web Master Tools:</label>
        <input type="text" value="<?=$BASE['Bing-SEO']?>" name="bing" readonly class="pure-input-1">
    <input type="submit" value="更新" class="pure-button pure-button-primary" id="submitBtn">
    <button type="button" onclick="formreset()" class="pure-button button-warning">元に戻す</button>
</form>
</div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
