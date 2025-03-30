<?php require_once(__DIR__.'/general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');

class Edit_project{

    private $name; private $engname; private $colour; private $description; private $thumbnail; private $id;

    public function __construct($name, $engname, $colour, $description, $thumbnail, $id){
        $this->name = $name;
        $this->engname = $engname;
        $this->colour = $colour;
        $this->description = $description;
        $this->thumbnail = $thumbnail;
        $this->id = $id;
    }
    public function UpdateDB(){
        $query = new DatabaseStatement("UPDATE project SET pName = :pName, pEngName = :pEngName, pDescription = :pDescription, pColour = :pColour, pThumbnail = :pThumbnail WHERE id = :id");
        $result = $query->Operation([
            ':pName' => $this->name,
            ':pEngName' => $this->engname,
            ':pDescription' => $this->description,
            ':pColour' => $this->colour,
            ':pThumbnail' => $this->thumbnail,
            ':id' => $this->id
        ]);
        if($result){
            $log_data = date("Y-m-d H:i:s").', EDT, "'.$this->name.'"';
            generate_log('/project/project-', $log_data);
            return $result;
        }
    }
}