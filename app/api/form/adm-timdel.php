<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST['id'])){
        $id = $_POST['id'];
        $query = new DatabaseStatement("DELETE FROM timeline WHERE id = :id");
        $result = $query->Operation([':id' => $id]);
        if($result > 0){
            return_header('/admin/timeline/');
        }
    }else{
        return_header('/admin/timeline/?error=Stop_Fingering_The_page');
    }
}