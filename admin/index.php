<?php require_once(__DIR__.'/../vendor/autoload.php');

use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\csrf_form;
use function Raymondoor\Func\hidden_form;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\pageconfig;
use function Raymondoor\Func\return_header;

$_SESSION[APP_NAME]['credit']=[
    'organization'=>APP_NAME,
    'main developer'=>'8期_岡崎叶和',
    'contributors'=>'広報部'
];

if(!isset($_SESSION[APP_NAME]['user']) || !$_SESSION[APP_NAME]['user']){

if(isset($_SESSION[APP_NAME]['login_over']) && $_SESSION[APP_NAME]['login_over']){
    return_header();
}
App::csrf();
pageconfig([
    'TITLE'=>'管理ログイン | '.APP_NAME,
    'INDEX'=>'login',
    'ALIAS'=>'管理者ログイン'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <div id="inputfeild">
        <div id="loginForm">
            <form class="pure-form pure-form-stacked" method="post" action="<?=POST_URL?>login">
                <?=csrf_form('login')?>
                <?=hidden_form()?>
                <fieldset>
                    <?=htmlmessage()?>
                    <label for="stacked-user">ユーザー名</label>
                    <input id="stacked-user" type="text" placeholder="ユーザー名" required autofocus autocomplete="off" name="name"/>
                    <label for="stacked-password">パスワード</label>
                    <input id="stacked-password" type="password" placeholder="パスワード" required name="password"/>
                    <br>
                    <button type="submit" class="pure-button pure-button-primary">ログイン</button>
                </fieldset>
            </form>
            <form class="pure-form pure-form-stacked" method="post" action="<?=ADMIN_URL?>/google.php">
                <label for="">通常ユーザーはこちらから</label>
                <button class="gsi-material-button">
                    <div class="gsi-material-button-state"></div>
                    <div class="gsi-material-button-content-wrapper">
                        <div class="gsi-material-button-icon">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                            <path fill="none" d="M0 0h48v48H0z"></path>
                        </svg>
                        </div>
                        <span class="gsi-material-button-contents">Googleでログイン</span>
                        <span style="display: none;">Googleでログイン</span>
                    </div>
                    </button>
            </form>
        </div>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');

}else{

UserAuth::admin_gate();
pageconfig([
    'TITLE'=>'管理トップ | '.APP_NAME,
    'INDEX'=>'admin',
    'ALIAS'=>'管理トップ'
]);
include_once(VIEW_DIR.'/html-head.php');
include_once(VIEW_DIR.'/html-header.php');
?>
<main>
<?php include_once(VIEW_DIR.'/adm-nav.php');?>
<?php include_once(VIEW_DIR.'/adm-nav-top.php');?>
    <h2 class="admTitle"><?=\App::get('ALIAS')?></h2>
    <h3 class="admTitle"><?=$_SESSION[APP_NAME]['user']['name'].'さんこんにちは！'?></h3>
    <?=htmlmessage()?>
    <div id="message">
        <p>不明点や不具合がある場合は管理者にお問い合わせください。</p>
    </div>
    <div id="usefullinks">
        <div class="ulink"><a href="https://aguinfo.jm.aoyama.ac.jp/AGUInfo/message_list.aspx" target="_blank">学生ポータル</a></div>
        <div class="ulink"><a href="https://cp.aim.aoyama.ac.jp/lms/lginLgir/#" target="_blank">コースパワー</a></div>
        <div class="ulink"><a href="https://classroom.google.com" target="_blank">Googleクラスルーム</a></div>
        <div class="ulink"><a href="https://drive.google.com/drive/folders/1zLY-OA-zHRTRMeDE54GVT7hlu9afAaNJ" target="_blank">PJ資料</a></div>
    </div>
</main>
<?php
include_once(VIEW_DIR.'/html-footer.php');
}