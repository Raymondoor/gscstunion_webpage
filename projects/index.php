<?php $title='プロジェクト一覧';
$file='PROJECTS';
$root='../';

require_once(__DIR__.'/'.$root.'/app/api/general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/list_content.php');

include_once(TEMPLATE_DIR.'/header.php');
?>
<main>
    <div id="description">
        <h1>プロジェクト一覧</h1>
        <p>学生連合では以下にあるプロジェクトごとに様々な企画を行っています。学連員は各自の希望するプロジェクトに自由に参加することが出来ます。</p>
    </div>
    <hr>
    <div id="projects-container">
<?=list_projects_index()?>
    </div>
    <hr>
    <div id="archiveIntro">
        <h2>活動停止中のプロジェクトはこちらから</h2>
        <a href="<?=APP_URL?>/archive/"><h4>アーカイブ</h4></a>
        <p>学連には、期間限定であったり活動内容の変更によって活動が止まったプロジェクトがあります。これらはアーカイブとして見れるようになっているため、興味がある方はご覧ください。</p>
    </div>
</main>
<?php
include_once(TEMPLATE_DIR.'/footer.php');