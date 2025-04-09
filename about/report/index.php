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
        <table>
            <tr>
                <th>年度</th>
                <th>PDF（Google Driveに保存されています）</th>
            </tr>
<?php
if(!empty($reports)){
    $termCounts = [];
    foreach($reports as $row){
        $termCounts[$row['term']] = ($termCounts[$row['term']] ?? 0) + 1;
    }
    $previousterm = null;
    foreach($reports as $row){?>
            <tr><?php
        if($previousterm !== $row['term']){
            // Add rowspan attribute with the count of names for this term?>
                <td rowspan='<?=$termCounts[$row['term']]?>'><?=$row['term']?>年度末書類</td><?php
            $previousterm = $row['term'];
        }?>
                <td><li><a href="<?=$row['link']?>" target="_blank"><?=$row['name']?>&#8599</a></li></td>
            </tr><?php
    }
}?>
        </table>
    </div>
    <div id="aboutNavContainer">
<?php include_once(TEMPLATE_DIR.'/about.php');?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');