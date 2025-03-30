<?php $root='../../';
require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/zip_log.php');
require_once(API_DIR.'/validate_admin.php');
session_start();
admin_gate();

$ziploc = DATA_DIR.'/tmp/'.date('Y-m-d').'.zip';
if(zip_log($ziploc)){
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($ziploc) . '"');
    header('Content-Length: ' . filesize($ziploc));
    readfile($ziploc);
    unlink($ziploc);
    exit;
}else{
    $title='ログダウンロード失敗';
    $file='ADMIN'.'-'.'LOG-LOG';
    include_once(TEMPLATE_DIR.'/header.php');
    ?>
    <main>
    <h2>ダウンロードに失敗しました。ファイルを直接確認してください。</h2>
    <a href="./">元のページに戻る</a>
    </main>
    <?php
    include_once(TEMPLATE_DIR.'/footer.php');
}