<?php
use function Raymondoor\Func\indexIs;
?>
<style>
@import url("<?=STYLE_URL?>/template/adm-nav.css");
</style>
<div class="adm-nav">
    <ul class="nav-ul-main">
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/content/" class="<?=indexIs('admin-content')?'is':''?>">コンテンツ</a></li>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/content/base/" class="<?=indexIs('admin-content-base')?'is':''?>">基本情報</a></li>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/content/about/" class="<?=indexIs('admin-content-about')||indexIs('admin-content-policy')||indexIs('admin-content-license')?'is':''?>">私たちについて</a></li>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/content/report/" class="<?=indexIs('admin-content-report')?'is':''?>">年次報告</a></li>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/content/sns/" class="<?=indexIs('admin-content-sns')?'is':''?>">ソーシャルアカウント</a></li>
    </ul>
</div>
<hr>