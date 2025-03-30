<?php require_once(__DIR__.'/general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');

class New_project{
    private $name; private $engname; private $colour; private $description; private $thumbnail; private $dirname; private $newid;

    public function __construct($name, $engname, $colour, $description, $thumbnail, $dirname){
        $this->name = $name;
        $this->engname = $engname;
        $this->colour = $colour;
        $this->description = $description;
        $this->thumbnail = $thumbnail;
        $this->dirname = $dirname;
    }
    public function InsertDB(){
        $query = new DatabaseStatement("INSERT INTO project (pName, pEngName, pDescription, pColour, pThumbnail, pDirName) VALUES (:pName, :pEngName, :pDescription, :pColour, :pThumbnail, :pDirName)");
        $result = $query->Operation([
            ':pName' => $this->name,
            ':pEngName' => $this->engname,
            ':pDescription' => $this->description,
            ':pColour' => $this->colour,
            ':pThumbnail' => $this->thumbnail,
            ':pDirName' => $this->dirname
        ]);
        if($result){
            $this->newid = $query->lastInsertId();
            $log_data = date("Y-m-d H:i:s").', NEW, "'.$this->name.'"';
            generate_log('/project/project-', $log_data);
            return $this->MakeFile();
        }
    }
    public function MakeFile(){
        $page = file_get_contents(TEMPLATE_DIR.'/project.php');
        $page = str_replace('obId', $this->newid, $page);
        if(!is_dir(PROJECTS_DIR.'/'.$this->dirname)){
            mkdir(PROJECTS_DIR.'/'.$this->dirname, 0755);
        }
        $filename = PROJECTS_DIR.'/'.$this->dirname.'/'.'index.php';
        $file = fopen($filename, 'w');
        fwrite($file, $page);
        fclose($file);
        chmod($filename, 0755);
        return $this->newid;
    }
}