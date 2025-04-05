<?php require_once(__DIR__.'/general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/dynamic_date.php');
/*
Update $content within function according to html styling.
url to article will be (ARTICLE_URL.'/'.(article.id).'.php')
*/
function list_projects_index(){
    $query = new DatabaseStatement("SELECT * FROM project WHERE pIsActive = 1 ORDER BY pOrder ASC");
    $list = $query->Operation([]);
    $content = '';
    ob_start();
    foreach($list as $key => $project){ ?>
        <div class="project" id="<?=$project['id']?>" style="background-color:#<?=$project['pColour']?>">
            <a href="<?=PROJECTS_URL.'/'.$project['pDirName']?>/">
                <div class="a">
                    <div class="image" style="background-image:url(<?=IMAGES_URL.'/main/projects/'.$project['pThumbnail']?>)"></div>
                    <h3><?=$project['pName']?></h3>
                    <p><?=mb_substr(sanitize_main($project['pDescription']),0,50,'UTF-8').(mb_strlen(sanitize_main($project['pDescription']),'UTF-8')>50 ? '...' : '')?></p>
                </div>
            </a>
        </div><?=PHP_EOL?><?php
    }
    $content.= ob_get_clean();
    return $content;
}
function list_projects_edit(){
    $query = new DatabaseStatement("SELECT * FROM project ORDER BY id ASC");
    $list = $query->Operation([]);
    $content = '';
    ob_start();
    if(empty($list)){ ?>
        <div class="project" style="background-color:#c0c0c0">
        <div class="psec1">
            <div class="pText">
                <h2><a href="./new.php">プロジェクトを登録する</a></h2>
                <p>新しく追加してください。</p>
            </div>
        </div>
    </div><?=PHP_EOL?><?php
    }
    foreach($list as $key => $project){ ?>
        <div class="project" id="<?=$project['id']?>" style="background-color:#<?=$project['pColour']?>">
        <div class="psec1">
            <div class="pText">
                <h2><a href="<?=PROJECTS_URL.'/'.$project['pDirName']?>/"><?=$project['pName']?></a></h2>
            </div>
            <div class="pImage" style="background-image:url(<?=IMAGES_URL.'/main/projects/'.$project['pThumbnail']?>)">
            </div>
        </div>
        <div class="psec2">
            <a href="./edit.php?id=<?=$project['id']?>"><input type="submit" value="編集"></a>
        </div>
    </div><?=PHP_EOL?><?php
    }
    $content .= ob_get_clean();
    return $content;
}
function list_projects_order(){
    $query = new DatabaseStatement("SELECT * FROM project ORDER BY id ASC");
    $list = $query->Operation([]);
    $content = '';
    ob_start();
    if(empty($list)){ ?>
        <div class="project" style="background-color:#c0c0c0">
        <div class="psec1">
            <div class="pText">
                <h2><a href="./new.php">プロジェクトを登録する</a></h2>
                <p>新しく追加してください。</p>
            </div>
        </div>
    </div><?=PHP_EOL?><?php
    }
    foreach($list as $key => $project){ ?>
        <div class="project" id="<?=$project['id']?>" style="background-color:#<?=$project['pColour']?>">
        <div class="psec1">
            <div class="pText">
                <h2><a href="<?=PROJECTS_URL.'/'.$project['pDirName']?>/"><?=$project['pName']?></a></h2>
            </div>
            <div class="pImage" style="background-image:url(<?=IMAGES_URL.'/main/projects/'.$project['pThumbnail']?>)">
            </div>
        </div>
    </div><?=PHP_EOL?><?php
    }
    $content .= ob_get_clean();
    return $content;
}
function list_projects_archive(){
    $query = new DatabaseStatement("SELECT * FROM project WHERE pIsActive = 0 ORDER BY id ASC");
    $list = $query->Operation([]);
    $content = '';
    ob_start();
    foreach($list as $key => $project){ ?>
        <div class="project" id="<?=$project['id']?>" style="background-color:#<?=$project['pColour']?>">
            <a href="<?=PROJECTS_URL.'/'.$project['pDirName']?>/">
                <div class="a">
                    <div class="image" style="background-image:url(<?=IMAGES_URL.'/main/projects/'.$project['pThumbnail']?>)"></div>
                    <h3><?=$project['pName']?></h3>
                    <p><?=mb_substr(sanitize_main($project['pDescription']),0,50,'UTF-8').(mb_strlen(sanitize_main($project['pDescription']),'UTF-8')>50 ? '...' : '')?></p>
                </div>
            </a>
        </div><?=PHP_EOL?><?php
    }
    $content.= ob_get_clean();
    return $content;
}
function list_articles_index(){
    $query = new DatabaseStatement(
        "SELECT article.*, project.pName, project.pColour AS colour
        FROM article JOIN project ON article.projectid = project.id ORDER BY article.id DESC LIMIT 10");
    $list = $query->Operation([]);
    $content = '';
    $num = 0;
    if(empty($list)){?>
        <div style="background-color: grey" class="article grid<?=$num?>">
        <a href="./">
            <div class="aImage"></div>
            <div class="aText">
                <h3>まだ記事がありません。</h3>
                <p><i><?=date('Y-m-d')?></i></p>
                <p class="mainBits">掲載をお待ちください！</p>
            </div>
        </a>
        </div><?=PHP_EOL?><?php
    }
    ob_start();
    foreach($list as $key => $article){ $num++;?>
        <div style="background-color: #<?=$article['colour']?>" class="article grid<?=$num?>">
        <a href="<?=PAGE_URL.'/'.$article['id'].'.php'?>">
            <div class="aImage" style="background-image: url(<?=IMAGES_URL.'/main/articles/thumbnail/'.$article['thumbnail']?>);"></div>
            <div class="aText">
                <h3><?=mb_substr(sanitize_main($article['title']),0,45,'UTF-8').(mb_strlen(sanitize_main($article['title']),'UTF-8')>45 ? '...' : '')?></h3>
                <p><i><?=$article['date']?></i></p>
                <p class="mainBits"><?=mb_substr(sanitize_main($article['main']),0,40,'UTF-8').(mb_strlen(sanitize_main($article['main']),'UTF-8')>40 ? '...' : '')?></p>
            </div>
        </a>
        </div><?=PHP_EOL?><?php
    }
    $content .= ob_get_clean();
    $num = 0;
    return $content;
}
function list_articles_index_all(){
    $query = new DatabaseStatement(
        "SELECT article.*, project.pName, project.pColour AS colour
        FROM article JOIN project ON article.projectid = project.id ORDER BY article.id DESC");
    $list = $query->Operation([]);
    $content = '';
    $num = 0;
    ob_start();
    foreach($list as $key => $article){ $num++;?>
        <div style="background-color: #<?=$article['colour']?>" class="article grid<?=$num?>">
        <a href="<?=PAGE_URL.'/'.$article['id'].'.php'?>">
            <div class="aImage" style="background-image: url(<?=IMAGES_URL.'/main/articles/thumbnail/'.$article['thumbnail']?>);"></div>
            <div class="aText">
                <h3><?=mb_substr(sanitize_main($article['title']),0,45,'UTF-8').(mb_strlen(sanitize_main($article['title']),'UTF-8')>45 ? '...' : '')?></h3>
                <p><i><?=$article['date']?></i></p>
                <p class="mainBits"><?=mb_substr(sanitize_main($article['main']),0,40,'UTF-8').(mb_strlen(sanitize_main($article['main']),'UTF-8')>40 ? '...' : '')?></p>
            </div>
        </a>
        </div><?=PHP_EOL?><?php
    }
    $content .= ob_get_clean();
    $num = 0;
    return $content;
}
function list_articles_home(){
    $query = new DatabaseStatement(
        "SELECT article.*, project.pName, project.pColour AS colour
        FROM article JOIN project ON article.projectid = project.id ORDER BY article.id DESC LIMIT 6");
    $list = $query->Operation([]);
    $content = '';
    ob_start();
    foreach($list as $key => $article){ 
        $date = explode('-', $article['date']);
        ?>
    <div class="article card">
    <div class="wrapper" style="background: url(<?=IMAGES_URL.'/main/articles/thumbnail/'.$article['thumbnail']?>) center/cover no-repeat;">
    <div class="date" style="background-color: #<?=$article['colour']?>;"><?=$date[0]?>年<?=$date[1]?>月<?=$date[2]?>日</div>
      <div class="data" style="background-color: #<?=$article['colour']?>;">
        <div class="content">
          <span class="pjname"><?=$article['pName']?> PJ</span>
          <h3><a href="<?=PAGE_URL.'/'.$article['id'].'.php'?>" class="card_href" style="color:#fff"><?=mb_substr(sanitize_main($article['title']),0,20,'UTF-8').(mb_strlen(sanitize_main($article['title']),'UTF-8')>20 ? '...' : '')?></a></h3>
          <p class="text"><?=mb_substr(sanitize_main($article['main']),0,40,'UTF-8').(mb_strlen(sanitize_main($article['main']),'UTF-8')>40 ? '...' : '')?></p>
          <a href="<?=PAGE_URL.'/'.$article['id'].'.php'?>" class="button">詳しく読む</a>
        </div>
      </div>
    </div>
  </div><?=PHP_EOL?><?php
    }
    $content .= ob_get_clean();
    return $content;
}
function list_articles_edit(){
    $query = new DatabaseStatement("SELECT article.*, project.id as pid, project.pColour as pColour FROM article JOIN project ON article.projectid = project.id ORDER BY id DESC");
    $list = $query->Operation([]);
    $content = '';
    ob_start();
    foreach($list as $key => $article){ ?>
    <div class="container" style="background-color: #<?=$article['pColour']?>;">
        <h3><a href="<?=PAGE_URL.'/'.$article['id'].'.php'?>"><?=$article['title']?></a></h3>
        <a href="./delete.php?id=<?=$article['id']?>"><input type="button" value="削除"></a>
    </div>
    <?php }
    $content .= ob_get_clean();
    return $content;
}
function list_articles_project($projectid){
    $query = new DatabaseStatement(
        "SELECT article.*, project.pColour AS colour
        FROM article JOIN project ON article.projectid = project.id AND project.id = :projectid ORDER BY article.id DESC");
    $list = $query->Operation([':projectid' => $projectid]);
    $content = '';
    ob_start();
    if(empty($list)){?>
        <h3>このプロジェクトにはまだ記事がありません。ごめんね&#x1F622</h3>
    <?php }
    foreach($list as $key => $article){ ?>
        <div style="background-color: #<?=$article['colour']?>" class="article">
        <a href="<?=PAGE_URL.'/'.$article['id'].'.php'?>">
            <div class="aImage" style="background-image: url(<?=IMAGES_URL.'/main/articles/thumbnail/'.$article['thumbnail']?>);"></div>
            <div class="aText">
                <h3><?=mb_substr(sanitize_main($article['title']),0,45,'UTF-8').(mb_strlen(sanitize_main($article['title']),'UTF-8')>45 ? '...' : '')?></h3>
                <p><i><?=$article['date']?></i></p>
                <p class="mainBits"><?=mb_substr(sanitize_main($article['main']),0,50,'UTF-8').(mb_strlen(sanitize_main($article['main']),'UTF-8')>50 ? '...' : '')?></p>
            </div>
        </a>
        </div><hr><?=PHP_EOL?><?php
    }
    $content .= ob_get_clean();
    return $content;
}
function list_timeline_index(){
    $query = new DatabaseStatement("SELECT * FROM timeline ORDER BY id DESC LIMIT 8");
    $list = $query->Operation([]);
    $content = '';
    $num = 0;
    ob_start();
    if(empty($list)){ global $SEO;?>
        <div class="post" id="tColour1">
            <p class="author"><?=$SEO['Alias']?> より</p>
            <p class="date"><i><?=date('Y-m-d')?></i></p>
            <p class="message">> まだメッセージがありません</p>
        </div><?=PHP_EOL?><?php
    }
    foreach($list as $key => $timeline){ $num ++; ?>
        <div class="post" id="tColour<?=$num?>">
            <p class="author"><?=$timeline['author']?> より</p>
            <p class="date"><i><?=dynamic_date_disp($timeline['date'])?></i></p>
            <p class="message">> <?=$timeline['message']?></p>
        </div><?=PHP_EOL?><?php
    }
    $content .= ob_get_clean();
    $num = 0;
    return $content;
}
function list_timeline_edit(){
    $query = new DatabaseStatement("SELECT * FROM timeline ORDER BY id DESC");
    $list = $query->Operation([]);
    $content = '';
    foreach($list as $key => $timeline){
        $content .= 
        '<div class="post" id="'.$timeline['id'].'">
            <p class="author">'.$timeline['author'].'</p>
            <p class="date"><i>'.$timeline['date'].'</i></p>
            <p class="message">> '.$timeline['message'].'</p>
            <form action="'.FORM_URL.'/adm-timdel.php" method="post" id="hidden">
                <input type="hidden" name="id" value="'.$timeline['id'].'">
                <input type="submit" value="削除">
            </form>
        </div>'.PHP_EOL;
    }
    return $content;
}
function list_xlink_index(){
    $xlink = file_get_contents(DATA_DIR.'/json/xlink.json');
    $xlink = json_decode($xlink, true);
    $content = '';
    ob_start();
    foreach($xlink as $var){?>

        <h3>・<?=$var['Name']?></h3>
        <p><?=$var['Comment']?></p>
        <a href="<?=$var['Url']?>" target="_blank"><?=$var['Url']?></a><hr><?=PHP_EOL?><?php
    }
    $content .= ob_get_clean();
    return $content;
}