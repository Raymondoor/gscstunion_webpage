<?php $title='ソーシャルメディア';
$file='ABOUT-SNS';
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
        <h1>ソーシャルメディア</h1>
        <p>SNSでもGSC学生連合の活動状況や開催予定のイベント情報を発信しています。皆さまからのフォローをお待ちしております。</p>
<?php foreach($SNS as $ID => $var){ ?>
        <div class="account">
            <a href="<?=$var['Link']?>" target="_blank">
                <p><?=$var['Title']?></p>
                <div class="image" style="background-image: url(<?=IMAGES_URL.'/share/sns/'.$var['Icon']?>)"></div>
            </a>
        </div>
<?php } ?>
    </div>
    <div id="aboutNavContainer">
<?php include_once(TEMPLATE_DIR.'/about.php');?>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');