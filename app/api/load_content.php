<?php require_once(__DIR__.'/general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/LINK.php');
function load_seo(){
    $SEO = file_get_contents(DATA_DIR.'/json/SEO.json');
    return json_decode($SEO, true);
    // $SEO['ID']
    // $SEO['ID']["var"]
}
function load_sns(){
    $SNS = file_get_contents(DATA_DIR.'/json/SNS.json');
    return json_decode($SNS, true);
    /*
    foreach($SNS as $ID => $var){
        $var['var']
    }
    $SNS['ID']['var']
    */
}
function load_report(int $term = 0){
    if(empty($term)){
        $query = new DatabaseStatement("SELECT * FROM report ORDER BY term DESC");
        $list = $query->Operation([]);
        return $list;
    }else{
        $query = new DatabaseStatement("SELECT * FROM report WHERE term = :term");
        $list = $query->Operation([':term' => $term]);
        return $list;
    }
}
function load_content(){
    $content = json_decode(file_get_contents(DATA_DIR.'/json/content.json'), true);
    $filedata = [];
    foreach($content as $filename){
        $tag = str_replace('.html', '', $filename);
        $filepath = DATA_DIR.'/content/'.$filename;
        if(file_exists($filepath)){
            $filehtml = file_get_contents($filepath);
            if(!empty($filehtml)){
                $filedata[$tag] = $filehtml;
            }else{
                $filedata[$tag] = 'No data inside: '.$tag;
            }
        }else{
            $filedata[$tag] = 'File not found: '.$filename;
        }
    }
    return $filedata;
    // $content['slogan']
}
function load_projects(){ // SELECT * FROM project WHERE pIsActive = 1 ORDER BY pOrder ASC
    $query = new DatabaseStatement("SELECT * FROM project WHERE pIsActive = 1 ORDER BY pOrder ASC");
    $list = $query->Operation([]);
    return $list;
}
function load_project($id){ // SELECT * FROM project WHERE id = :id
    $query = new DatabaseStatement("SELECT * FROM project WHERE id = :id");
    $list = $query->Operation([':id' => $id]);
    if(empty($list)){
        return false;
    }else{
        $project = $list[0];
        return $project;
    }
}
function load_projects_order(){ // SELECT * FROM project ORDER BY pOrder ASC
    $query = new DatabaseStatement("SELECT * FROM project ORDER BY pOrder ASC");
    $list = $query->Operation([]);
    return $list;
}
function load_article($id){ // SELECT * FROM article WHERE id = :id
    $query = new DatabaseStatement("SELECT * FROM article WHERE id = :id");
    $list = $query->Operation([':id' => $id]);
    if(empty($list)){
        return false;
    }else{
        $article = $list[0];
        return $article;
    }
}
function load_hashtags(){ // SELECT * FROM hashtag ORDER BY id ASC
    $query = new DatabaseStatement("SELECT * FROM hashtag ORDER BY id ASC");
    $list = $query->Operation([]);
    return $list;
}
function load_hashtag($id){ // SELECT article.*, image.*, FROM article JOIN image ON image.articleid = article.id WHERE id = :id
    $query = new DatabaseStatement("SELECT * FROM hashtag WHERE id = :id");
    $list = $query->Operation([':id' => $id]);
    $hashtag = $list[0];
    return $hashtag;
}