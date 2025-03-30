<?php require_once(__DIR__.'/general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');

class New_Article{
    private $title; private $date; private $main; private $thumbnail; private $projectid; private $hid; private $newid;

    public function __construct($title, $date, $main, $thumbnail, $projectid, $hid){
        $this->title = $title;
        $this->date = $date;
        $this->main = $main;
        $this->thumbnail = $thumbnail;
        $this->projectid = $projectid;
        $this->hid = $hid;
    }
    public function InsertDB(){
        $query = new DatabaseStatement("INSERT INTO article (title, date, main, thumbnail, projectid, hashtagid) VALUES (:title, :date, :main, :thumbnail, :projectid, :hashtagid)");
        $result = $query->Operation([
            ':title' => $this->title,
            ':date' => $this->date,
            ':main' => $this->main,
            ':thumbnail' => $this->thumbnail,
            ':projectid' => $this->projectid,
            ':hashtagid' => $this->hid
        ]);
        if($result){
            $this->newid = $query->lastInsertId();
            $log_data = date("Y-m-d H:i:s").', NEW, '.$this->projectid.', "'.$this->title.'"';
            generate_log('/article/article-', $log_data);
            return $this->MakeFile();
        }
    }
    public function MakeFile(){
        $page = file_get_contents(TEMPLATE_DIR.'/article.php');
        $page = str_replace('obID', $this->newid, $page);
        if(!is_dir(ARTICLES_DIR.'/page/')){
            mkdir(ARTICLES_DIR.'/page/', 0755);
        }
        $filename = ARTICLES_DIR.'/page/'.$this->newid.'.php';
        $file = fopen($filename, 'w');
        fwrite($file, $page);
        fclose($file);
        chmod($filename, 0755);
        return $this->newid;
    }
}