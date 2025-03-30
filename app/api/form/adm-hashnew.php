<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');


$query = new DatabaseStatement("SELECT * FROM hashtag");
$result = $query->Operation([]);

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST['newhash'])){
        $newhash = validate($_POST['newhash']);
        foreach($result as $category){
            if(strpos($category['hName'], $newhash) !== false){
                echo '<input type="text" class="optionField" onclick="selectOption('.$category['id'].')" value="#'.$category['hName'].'" readonly><br>';
            }
        }
    }
}