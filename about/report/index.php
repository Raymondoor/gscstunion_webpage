<?php $title='年次報告';
$file='ABOUT-REPORT';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

$reports = getdir();
include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <div id="htmlContainer">
        <h1>年次報告書</h1>
        <ul>
<?php foreach ($reports as $report){?>
            <li><a href="./<?=$report?>"><?=$SEO['Organization'].'_'.str_replace('.pdf', '', $report).'年度報告書'?></a></li>
<?php }?>
        </ul>
    </div>
    <div id="aboutNavContainer">
<?php include_once(TEMPLATE_DIR.'/about.php');?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');