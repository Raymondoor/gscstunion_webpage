<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Article;
use Raymondoor\Model\Display;

use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
use function Raymondoor\Func\dispStrPur;
use function Raymondoor\Func\return_header;

UserAuth::admin_gate();
pageconfig([
    'TITLE' => '記事削除 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-article-delete',
    'ALIAS' => '記事削除'
]);
if(isset($_GET['id'])):
$art = Article::article('id', $_GET['id']);
if(empty($art)):
    return_header('/admin/article/delete.php');
endif;
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-article.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <p id="desc">記事を削除した場合、その後復旧することは出来ません。誤字・脱字等があった場合に削除してください。</p>
    <div id="newpro">
        <ins><?=htmlmessage()?></ins>
        <div id="projectContainer">
            <div id="overview" style="background-color:<?=$art['color']?>;">
                <h2><?=$art['title']?></h2>
                <h4><em><?=$art['date']?></em></h4>
                <hr>
                <p><?=dispStrPur($art['main'])?></p>
            </div>
        </div>
        <form action="<?=POST_URL?>delete-article" method="post" class="pure-form pure-form-stacked" id="new-project-form">
            <div id="textbits">
                <?=csrf_form('deletearticle')?>
                <label>パスワード：</label>
                <span class="pure-form-message">本当に削除する場合は、以下に管理者パスワードを入力して削除ボタンを押してください。※そのまま確認無く削除されます。</span>
                <input type="password" placeholder="パスワード" required class="pure-input-1" name="password" id="name">
                <input type="hidden" name="id" value="<?=$art['id']?>">
            <input type="submit" value="削除" class="pure-button button-error">
        </form>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');

else:
$articles = Display::articles_index();
ob_start();
foreach($articles as $art): ?>
<div class="artContainer" style="background-color:<?=$art['color']?>;">
    <h3><?=dispStrPur($art['title'], 48)?></h3>
    <div id="delLinkBg" style="background:<?=$art['color']?>ee;background:linear-gradient(0deg,<?=$art['color']?>ff 0%,<?=$art['color']?>99 18%,#ffffff00 100%);">
        <a href="<?=CURRENT_URL.'?id='.$art['id']?>" id="delLink">削除</a>
    </div>
</div>
<?php endforeach;
$dispArt = ob_get_clean();
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-article.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <ins><?=htmlmessage()?></ins>
    <div id="articlesList">
<?=$dispArt?>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
endif;