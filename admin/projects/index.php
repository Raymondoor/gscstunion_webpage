<?php $title='プロジェクト管理';
$file='ADMIN'.'-'.'PROJECT';
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
    <h2>プロジェクト一覧</h2>
    <p><a href="./new.php">プロジェクト新規登録はこちら</a></p>
    <p><a href="./order.php">表示順を変更する</a></p><hr>
<?php echo list_projects_edit() ?>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');