<?php $title='GSC学生連合について';
$file='ABOUT';
$root='../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <div id="htmlContainer">
<?=$content['aboutus'].PHP_EOL?>
        <div id="aboutPrList">
            <h2>-Projects-</h2>
<?php $aboutproject = load_projects();
foreach($aboutproject as $project){?>
            <li><a href="<?=PROJECTS_URL.'/'.$project['pDirName']?>"><?=$project['pName']?></a></li>
<?php }?>
        </div>
    </div>
    <div id="aboutNavContainer">
<?php include_once(TEMPLATE_DIR.'/about.php');?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');