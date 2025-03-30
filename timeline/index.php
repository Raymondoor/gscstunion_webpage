<?php $title='閑話（タイムライン）';
$file='TIMELINE';
$root='../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <h1>閑話（タイムライン）</h1>
    <div id="timelineContainer">
<?=list_timeline_index()?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');