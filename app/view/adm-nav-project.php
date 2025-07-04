<?php
use function Raymondoor\Func\indexIs;
?>
<style>
@import url("<?=STYLE_URL?>/template/adm-nav.css");
</style>
<div class="adm-nav">
    <ul class="nav-ul-main">
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/project/" class="<?=indexIs('admin-project')?'is':''?>">プロジェクト一覧</a></li>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/project/new.php" class="<?=indexIs('admin-project-new')?'is':''?>">新規登録</a></li>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/project/edit.php" class="<?=indexIs('admin-project-edit')?'is':''?>">編集</a></li>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/project/order.php" class="<?=indexIs('admin-project-order')?'is':''?>">表示順</a></li>
<?pHp if($_SESSION[APP_NAME]['user']['super']):?>
        <li class="nav-li-main dark"><a href="<?=ADMIN_URL?>/project/delete.php" class="<?=indexIs('admin-project-delete')?'is':''?>">削除</a></li>
<?php endif;?>
    </ul>
</div>