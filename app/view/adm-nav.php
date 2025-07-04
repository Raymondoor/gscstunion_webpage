<?php
use function Raymondoor\Func\indexIs;
use function Raymondoor\Func\indexAre;
?>
<style>
@import url("<?=STYLE_URL?>/template/adm-nav.css");
</style>
<div class="adm-nav">
    <ul class="nav-ul-main">
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/" class="<?=indexIs('admin')?'is':''?>">管理トップ</a></li>
        <li class="nav-li-main light">
            <a href="<?=ADMIN_URL?>/article/" class="<?=indexAre('admin-article')?'is':''?>">記事</a>
            <ul class="nav-ul-child">
                <li class="nav-li-child"><a href="<?=ADMIN_URL?>/article/new.php" class="<?=indexIs('admin-article-new')?'is':''?>">投稿</a></li>
                <li class="nav-li-child"><a href="<?=ADMIN_URL?>/article/delete.php" class="<?=indexIs('admin-article-delete')?'is':''?>">削除</a></li>
            </ul>
        </li>
        <li class="nav-li-main dark">
            <a href="<?=ADMIN_URL?>/project/" class="<?=indexAre('admin-project')?'is':''?>">プロジェクト</a>
            <ul class="nav-ul-child">
                <li class="nav-li-child"><a href="<?=ADMIN_URL?>/project/new.php" class="<?=indexIs('admin-project-new')?'is':''?>">新規登録</a></li>
                <li class="nav-li-child"><a href="<?=ADMIN_URL?>/project/edit.php" class="<?=indexIs('admin-project-edit')?'is':''?>">編集</a></li>
                <li class="nav-li-child"><a href="<?=ADMIN_URL?>/project/order.php" class="<?=indexIs('admin-project-order')?'is':''?>">表示順</a></li>
<?pHp if($_SESSION[APP_NAME]['user']['super']):?>
                <li class="nav-li-child"><a href="<?=ADMIN_URL?>/project/delete.php" class="<?=indexIs('admin-project-delete')?'is':''?>">削除</a></li>
<?php endif;?>
            </ul>
        </li>
        <li class="nav-li-main light"><a href="<?=ADMIN_URL?>/timeline/" class="<?=indexIs('admin-timeline')?'is':''?>">タイムライン</a></li>
<?pHp if($_SESSION[APP_NAME]['user']['super']):?>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/content/" class="<?=indexAre('admin-content')?'is':''?>">コンテンツ</a></li>
<?php endif;?>
        <li class="nav-li-main <?=$_SESSION[APP_NAME]['user']['super']?'light':'dark'?>"><a href="<?=ADMIN_URL?>/dev/" class="<?=indexIs('admin-dev')?'is':''?>">システム</a></li>
    </ul>
</div>
<hr>