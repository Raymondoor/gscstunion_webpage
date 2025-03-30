<?php $title='ログ確認';
$file='ADMIN'.'-'.'LOG';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');
require_once(API_DIR.'/validate_admin.php');
session_start();
admin_gate();
include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <h2>ログ確認</h2>
    <div id="dlbtn"><a href="./log.php"><b>全ログをダウンロード（Zip）</b><img src="<?=IMAGES_URL?>/share/bits/download.png"></a></div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');