<?php $title='記事管理';
$file='ADMIN'.'-'.'ARTICLE';
$root='../../';

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
    <h2>記事一覧</h2>
    <p><a href="./new.php">記事新規登録はこちら</a></p><hr>
<?=list_articles_edit()?>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');