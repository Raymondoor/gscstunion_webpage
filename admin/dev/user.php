<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\User;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\csrf_form;
use function Raymondoor\Func\return_header;
UserAuth::admin_gate();
if(!$_SESSION[APP_NAME]['user']['super']){
    return_header('/admin/dev/');
    exit;
}
$users = User::allAllowedGU();
pageconfig([
    'TITLE' => 'ユーザー管理 | 管理 | '.APP_NAME,
    'INDEX' => 'admin-dev-user',
    'ALIAS' => 'ユーザー管理'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <p id="desc">メールアドレスを登録することにより、そのアドレスの持ち主は各種記事等の編集が行えるようになります。そのユーザーは「Googleでログイン」を行うことで、システムに関わらない部分に限定した権限を得ます。登録可能なアドレスは地球社会共生学部のGoogleアカウントである「<strong>@gs.gsc.aoyama.ac.jp</strong>」で終わるもののみです。</p>
    <div id="newuser">
        <ins><?=htmlmessage()?></ins>
        <form action="<?=POST_URL?>new-user" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data" id="new-user-form">
            <div id="textbits">
                <?=csrf_form('newproject')?>
                <label>メールアドレス：</label>
                <span class="pure-form-message">「@gs.gsc.aoyama.ac.jp」のみ対応</span>
                <input type="text" placeholder="例：aa122000@gs.gsc.aoyama.ac.jp" required class="pure-input-1" name="email" id="name">
            </div>
            <input type="submit" value="登録" class="pure-button pure-button-primary">
        </form>
        <br>
        <div id="usertable"></div>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');