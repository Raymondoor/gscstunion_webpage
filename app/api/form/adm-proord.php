<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');
require_once(API_DIR.'/edit_project.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_gate('proord')){
    $positions = $_POST['order'];
    foreach($positions as $id => $pOrder){
        $query = new DatabaseStatement("UPDATE project SET pOrder = :pOrder WHERE id = :id");
        $result = $query->Operation([':pOrder' => $pOrder, ':id' => $id]);
    }
    if(!empty($result)){
        return_header('/admin/projects/');
    }
}