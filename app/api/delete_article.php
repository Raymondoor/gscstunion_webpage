<?php require_once(__DIR__.'/general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');

class Delete_Article{
    private $id; private $thumbnail;
    public function __construct($id){
        $this->id = $id;
    }
    public function DeleteDB(){
        $query = new DatabaseStatement("SELECT title, thumbnail FROM article WHERE id = :id");
        $data = $query->Operation([':id' => $this->id]);
        $this->thumbnail = $data[0]['thumbnail'];
        $query = new DatabaseStatement("DELETE FROM article WHERE id = :id");
        $result = $query->Operation([':id' => $this->id]);
        if(!$result){
            throw new Exception("Failed to delete article from database.");
        }
        if($result){
            $log_data = date("Y-m-d H:i:s").', DEL, "'.$data[0]['title'].'"';
            generate_log('/article/article-', $log_data);
            if($result){
                return $this->RemoveFile();
            }
        }
    }
    public function RemoveFile(){
        $deletion = ARTICLES_DIR.'/page/'.$this->id.'.php';
        $deletethumb = ROOT_DIR.'/assets/image/main/articles/thumbnail/'.$this->thumbnail;
        if(unlink($deletion) && unlink($deletethumb)){
            return true;
        }
    }
}