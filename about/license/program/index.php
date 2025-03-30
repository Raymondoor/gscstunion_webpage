<?php $title='使用コード';
$file='ABOUT-LICENSE-PROGRAM';
$root='../../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <div id="htmlContainer">
        <h2>使用外部コード（アルファベット順）</h2>
        <ul>
            <li><a href="https://github.com/juliangarnier/anime/" target="_blank">anime.js (Julian Garnier)</a></li>
            <li><a href="http://htmlpurifier.org/" target="_blank">HTML Purifier<img src="https://images.weserv.nl/?url=http://htmlpurifier.org/live/art/powered.png" alt="Powered by HTML Purifier" /></a></li>
            <li><a href="https://jquery.com/license/" target="_blank">jQuery</a></li>
            <li><a href="https://quilljs.com/" target="_blank">Quill</a></li>
        </ul>
        <h2>フォント</h2>
        <ul>
            <li><a href="https://fonts.google.com/share?selection.family=Zen+Kaku+Gothic+Antique|Zen+Maru+Gothic|Zen+Old+Mincho" target="_blank">(Zen Kaku Gothic Antique | Zen Maru Gothic | Zen Old Mincho) by Google Fonts</a></li>
        </ul>
        <h2>ソース</h2>
        <ul>
            <li><a href="https://github.com/Raymondoor/gscstunion_webpage" target="_blank">https://github.com/Raymondoor/gscstunion_webpage</a></li>
        </ul>
    </div>
    <div id="aboutNavContainer">
<?php include_once(TEMPLATE_DIR.'/about.php');?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');