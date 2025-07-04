<?php
use function Raymondoor\Func\indexIs;
?>
<style>
@import url("<?=STYLE_URL?>/template/adm-nav.css");
</style>
<div class="adm-nav">
    <ul class="nav-ul-main">
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/article/new.php" class="<?=indexIs('admin-article-new')?'is':''?>">記事投稿</a></li>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/timeline/" class="<?=indexIs('admin-timeline-new')?'is':''?>">タイムライン投稿</a></li>
    </ul>
</div>