<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/validate_admin.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'new'){
    if(csrf_gate('report-new')){
        if(!empty($_POST['label']) || !empty($_POST['report']) || !empty($_POST['term'])){
            $newlabel = $_POST['label'];
            $newreport = $_POST['report'];
            $newterm = $_POST['term'];

            $query = new DatabaseStatement("INSERT INTO report (term, name, link) VALUES (:term, :name, :link)");
            $result = $query->Operation([':term' => $newterm, ':name' => $newlabel, ':link' => $newreport]);
            if($result == 1){
                return_header('/admin/report/', true);
            }else{
                return_header('/admin/report/?&error=My_Bad');
            }
        }else{
            return_header('/admin/report/?error=Fill_All');
        }
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete'){
    if(csrf_gate('report-delete')){
        $name = $_POST['name'];
        $query = new DatabaseStatement("DELETE FROM report WHERE name = :name");
        $result = $query->Operation([':name' => $name]);
        if($result == 1){
            return_header('/about/report/', true);
        }else{
            return_header('/admin/report/?&error=My_Bad');
        }
    }
}