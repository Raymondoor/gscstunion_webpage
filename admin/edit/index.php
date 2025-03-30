<?php $title='基本内容管理';
$file='ADMIN'.'-'.'EDIT';
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
    <ul>
        <li><a href="./seo.php">基盤情報編集</a></li>
        <li><a href="./content.php">概要編集</a></li>
        <li><a href="./image.php">画像編集</a></li>
        <li><a href="./sns.php">ソーシャルアカウント編集</a></li>
    </ul>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');