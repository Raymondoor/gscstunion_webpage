<?php
use function Raymondoor\Func\indexIs;
use function Raymondoor\Func\indexAre;
$aboutUrl = ADMIN_URL.'/content';
?>
<style>
@import url("<?=STYLE_URL?>/template/adm-nav.css");
</style>
<div class="adm-nav">
    <ul class="nav-ul-main">
        <li class="nav-li-main dark"><a href="<?=$aboutUrl?>/about/" class="<?=indexAre('admin-content-about')?'is':''?>">私たちについて</a></li>
        <li class="nav-li-main dark"><a href="<?=$aboutUrl?>/policy/" class="<?=indexIs('admin-content-policy')?'is':''?>">各種方針</a></li>
        <li class="nav-li-main dark"><a href="<?=$aboutUrl?>/license/" class="<?=indexIs('admin-content-license')?'is':''?>">規約・ライセンス</a></li>
    </ul>
</div>
<hr>