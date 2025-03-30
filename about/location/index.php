<?php $title='所在地';
$file='ABOUT-LOCATION';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <div id="htmlContainer">
        <h1>所在地</h1>
        <div id="mapContainer">
            <h3><a href="https://www.openstreetmap.org/way/72302039" target="_blank">Open Street Map</a></h3>
            <iframe width="100%" height="680" src="https://www.openstreetmap.org/export/embed.html?bbox=139.3953895568848%2C35.56273529102419%2C139.40955162048343%2C35.57062472982181&amp;layer=mapnik&amp;marker=35.566680107522316%2C139.40247058868408" style="border: 1px solid black"></iframe>
        </div>
        </div>
    <div id="aboutNavContainer">
<?php include_once(TEMPLATE_DIR.'/about.php');?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');