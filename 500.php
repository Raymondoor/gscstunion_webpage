<?php
header("HTTP/1.0 404 Not Found"); // Ensure the proper 404 status is sent
$title='ページが存在しません';
$file='404';
$root='./';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <h1>500 - サーバー側の不具合が発生しました。</h1>
    <p>可能であれば開発者にお問い合わせください。</p>
    <p><u>※開発者の責任です。あなたは何も悪くありません。</u></p>
    <a href="<?=APP_URL?>/">ホームページに戻る</a>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');