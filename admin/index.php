<?php $title='管理者ページ';
$file='ADMIN';
$root='../';
require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');
require_once(API_DIR.'/validate_admin.php');
session_start();
admin_gate();
include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <ul>
        <li><a href="edit/">基礎内容編集</a></li>
        <li><a href="projects/">プロジェクト管理</a></li>
        <li><a href="articles/">記事管理</a></li>
        <li><a href="timeline/">タイムライン管理</a></li>
        <li><a href="report/">年次報告管理</a></li>
        <li><a href="log/">ログ確認</a></li>
        <li><a href="dev/">ステータス</a></li>
    </ul>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');