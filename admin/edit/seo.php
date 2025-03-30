<?php $title='基盤情報編集';
$file='ADMIN'.'-'.'EDIT-SEO';
$root='../../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');
require_once(API_DIR.'/validate_admin.php');
session_start();
admin_gate();
include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <form action="<?=FORM_URL?>/adm-seo.php" method="post">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <label for="Organization">組織名:</label>
        <input type="text" value="<?=$SEO['Organization']?>" name="Organization"><br>
        <label for="Alias">通称名:</label>
        <input type="text" value="<?=$SEO['Alias']?>" name="Alias"><br>
        <label for="Alias">大学名:</label>
        <input type="text" value="<?=$SEO['School']?>" name="School"><br>
        <label for="Alias">学部名:</label>
        <input type="text" value="<?=$SEO['Faculty']?>" name="Faculty"><br>
        <label for="Keywords">キーワード:</label>
        <input type="text" value="<?=$SEO['Keywords']?>" name="Keywords"><br>
        <label for="Description">説明:</label>
        <input type="text" value="<?=$SEO['Description']?>" name="Description"><br>
        <label for="FoundDate">設立日:</label><br>
        年<input type="number" value="<?=$SEO['FoundDate']['Year']?>" name="FoundDate[Year]" min="1" max="<?= date('Y')?>"><br>
        月<input type="number" value="<?=$SEO['FoundDate']['Month']?>" name="FoundDate[Month]" min="1" max="12"><br>
        日<input type="number" value="<?=$SEO['FoundDate']['Day']?>" name="FoundDate[Day]" min="1" max="31"><br>
        <label for="Location">住所:</label><br>
        建物名<input type="text" value="<?=$SEO['Location']['Building']?>" name="Location[Building]"><br>
        以降<input type="text" value="<?=$SEO['Location']['Street']?>" name="Location[Street]"><br>
        市区町村<input type="text" value="<?=$SEO['Location']['City']?>" name="Location[City]"><br>
        都道府県<input type="text" value="<?=$SEO['Location']['Prefecture']?>" name="Location[Prefecture]"><br>
        国<input type="text" value="<?=$SEO['Location']['Country']?>" name="Location[Country]"><br>
        国コード<input type="text" value="<?=$SEO['Location']['Country-Code']?>" name="Location[Country-Code]"><br>
        郵便番号<input type="text" value="<?=$SEO['Location']['Post']?>" name="Location[Post]"><br>
        <label for="Members">構成人数:</label>
        <input type="number" value="<?=$SEO['Members']?>" name="Members" min="1" max="500"><br>
        <label for="Members">Google Search Console:</label>
        <input type="text" value="<?=$SEO['Google-SEO']?>" name="google" readonly><br>
        <label for="Members">Bing Web Master Tools:</label>
        <input type="text" value="<?=$SEO['Bing-SEO']?>" name="bing" readonly><br>
        <input type="submit" value="更新">
    </form>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');