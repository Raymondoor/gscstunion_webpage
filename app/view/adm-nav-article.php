<?php
use function Raymondoor\Func\indexIs;
?>
<style>
@import url("<?=STYLE_URL?>/template/adm-nav.css");
</style>
<div class="adm-nav">
    <ul class="nav-ul-main">
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/article/" class="<?=indexIs('admin-article')?'is':''?>">記事一覧</a></li>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/article/new.php" class="<?=indexIs('admin-article-new')?'is':''?>">投稿</a></li>
        <!-- <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/article/edit.php" class="<?=indexIs('admin-article-edit')?'is':''?>">編集</a></li> -->
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/article/delete.php" class="<?=indexIs('admin-article-delete')?'is':''?>">削除</a></li>
    </ul>
</div>