<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\referer;
UserAuth::admin_gate();
pageconfig([
    'TITLE' => 'システム | 管理 | '.APP_NAME,
    'INDEX' => 'admin-dev',
    'ALIAS' => 'システム'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <div id="buttons-table">
<?php if($_SESSION[APP_NAME]['user']['super']): ?>
        <span>
            <a href="./user.php" title="<?=CURRENT_URL?>user.php" class="pure-button button-warning">ユーザー管理</a>
        </span>
<?php endif; ?>
        <span>
            <a href="./?gl=log" title="<?=CURRENT_URL?>?gl=log" class="pure-button button-success">ログ確認</a>
            <a href="./?gl=session" title="<?=CURRENT_URL?>?gl=session" class="pure-button button-success">セッション情報</a>
            <a href="./?gl=cookie" title="<?=CURRENT_URL?>?gl=cookie" class="pure-button button-success">クッキー情報</a>
        </span>
        <span>
            <a href="https://github.com/Raymondoor/gscstunion_webpage/" title="https://github.com/Raymondoor/gscstunion_webpage/" class="pure-button button-secondary" target="_blank">ソース（Github）</a>
<?php if($_SESSION[APP_NAME]['user']['super']): ?>
            <a href="https://secure.sakura.ad.jp/rs/cp/?pid=unknown" title="https://secure.sakura.ad.jp/rs/cp/?pid=unknown" class="pure-button button-secondary" target="_blank">コントロールパネル（外部）</a>
            <a href="./phpinfo.php" title="<?=CURRENT_URL?>phpinfo.php" class="pure-button button-secondary">phpinfo()</a>
<?php endif; ?>
        </span>
        <span>
            <form action="<?=POST_URL?>logout" method="post" ><button type="submit" value="Log Out" class="pure-button pure-button-primary">ログアウト</button></form>
        </span>
    </div>
    <hr>
    <div id="phpdata">
<?php if(isset($_GET['gl']) && $_GET['gl'] === 'session'): ?>
        <h3>$_SESSION</h3>
<?php dump($_SESSION);?>
<?php elseif(isset($_GET['gl']) && $_GET['gl'] === 'cookie'):?>
        <h3>$_COOKIE</h3>
<?php dump($_COOKIE);?>
<?php elseif(isset($_GET['gl']) && $_GET['gl'] === 'log'):?>
        <h3>ログ確認</h3>
<div id="logtable"></div>
<?php else: ?>
        <h3>データ確認</h3>
<pre>緑のボタンから選択してください。</pre>
<?php endif; ?>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');