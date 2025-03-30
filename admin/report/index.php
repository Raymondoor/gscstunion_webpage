<?php $title='年次報告管理';
$file='ADMIN'.'-'.'REPORT';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');
require_once(API_DIR.'/validate_admin.php');
session_start();
admin_gate();
$reports = getdir();
include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <h2>年次報告管理</h2>
    <hr>
    <div id="new">
        <h3>追加</h3>
        <form action="<?=FORM_URL?>/adm-report.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <input type="hidden" name="action" value="new">
            <label for="">ファイル（.pdf）ファイル名は<b>必ず</b>年度.pdfにしてください。例「2014.pdf」</label>
            <input type="file" name="report" accept=".pdf"><br>
            <input type="submit" value="公開">
        </form>
    </div>
    <hr>
    <div id="delete">
        <h3>削除</h3>
        <form action="<?=FORM_URL?>/adm-report.php" method="post">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            <input type="hidden" name="action" value="delete">
<?php foreach($reports as $item){?>
            <input type="submit" name="filename" value="<?=$item?>"><br>
<?php }?>
        </form>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');