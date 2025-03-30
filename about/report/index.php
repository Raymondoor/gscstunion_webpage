<?php $title='年次報告';
$file='ABOUT-REPORT';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

$reports = load_report();
include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <div id="htmlContainer">
        <h1>年次報告書</h1>
        <p>Google DriveにPDF形式で保存されています。</p>
        <ul>
<?php foreach ($reports as $report => $value){?>
            <li><a href="<?=$value?>" target="_blank"><?=$report?></a></li>
<?php }?>
        </ul>
    </div>
    <div id="aboutNavContainer">
<?php include_once(TEMPLATE_DIR.'/about.php');?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');