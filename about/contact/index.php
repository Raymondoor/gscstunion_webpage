<?php $title='お問い合わせ';
$file='ABOUT-CONTACT';
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
    <h1>お問い合わせ</h1>
    <p>ソーシャルアカウントのDMでも随時受け付けています。</p>
    <div id="form-dsk">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfdoFaIHDD06FjFs0TPcBo_iClnC_4aTziLe0FCp85hpOgIug/viewform?embedded=true" width="600" height="980" frameborder="0" marginheight="0" marginwidth="0">読み込んでいます…</iframe>
    </div>
    <div id="form-mbl">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfdoFaIHDD06FjFs0TPcBo_iClnC_4aTziLe0FCp85hpOgIug/viewform?embedded=true" width="350" height="1200" frameborder="0" marginheight="0" marginwidth="0">読み込んでいます…</iframe>
    </div>
    </div>
    <div id="aboutNavContainer">
<?php include_once(TEMPLATE_DIR.'/about.php');?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');