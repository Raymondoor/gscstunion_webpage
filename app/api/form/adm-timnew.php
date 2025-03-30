<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST['author']) || !empty($_POST['date']) || !empty($_POST['message'])){
        $author = validate($_POST['author']);
        $date = validate($_POST['date']);
        $message = validate($_POST['message']);
        $query = new DatabaseStatement("INSERT INTO timeline (author, message, date) VALUES (:author, :message, :date)");
        $result = $query->Operation([':author' => $author, ':message' => $message, ':date' => $date]);
        if($result > 0){
            return_header('/admin/timeline/');
        }
    }else{
        $_SESSION['delproerr'] = '全ての欄を埋めてください';
        return_header('/admin/projects/delete.php?id='.$id.'&error=Fill_All_Inputs');
    }
}