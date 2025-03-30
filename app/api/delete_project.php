<?php require_once(__DIR__.'/general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/delete_article.php');
// edit after all insert function is done
class Delete_project{
    private $id; private $pDirName; private $pName; private $pThumbnail;
    public function __construct($id){
        $this->id = $id;
    }
    public function DeleteDB(){
        $query = new DatabaseStatement("SELECT project.pDirName, project.pName, project.pThumbnail FROM project WHERE id = :id");
        $pData = $query->Operation([':id' => $this->id]);
        $this->pDirName = $pData[0]['pDirName'];
        $this->pName = $pData[0]['pName'];
        $this->pThumbnail = $pData[0]['pThumbnail'];
        $query = new DatabaseStatement("SELECT article.id FROM article WHERE projectid = :id");
        $allart = $query->Operation([':id' => $this->id]);
        if(!empty($allart)){
            foreach($allart as $art => $artid){
                $delart = new Delete_Article($artid['id']);
                $delete = $delart->DeleteDB();
            }
        }else{
            $delete = true;
        }
        if($delete){
            $query = new DatabaseStatement("DELETE FROM project WHERE id = :id");
            $result = $query->Operation([':id' => $this->id]);
            if($result){
                $log_data = date("Y-m-d H:i:s").', DEL, "'.$this->pName.'"';
                generate_log('/project/project-', $log_data);
                if ($delete) {
                    return $this->DeleteFile();
                }
            }
        }
    }

    public function DeleteFile(){
        $deletion = PROJECTS_DIR.'/'.$this->pDirName.'/index.php';
        $deletethumb = ROOT_DIR.'/assets/image/main/projects/'.$this->pThumbnail;
        unlink($deletethumb);
        if(unlink($deletion)){
            return rmdir(PROJECTS_DIR.DIRECTORY_SEPARATOR.$this->pDirName);
        }
    }
}