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
        if(!empty($_POST['label']) || !empty($_POST['report'])){
            $newlabel = $_POST['label'];
            $newreport = $_POST['report'];
            $data = load_report();
            $data[$newlabel] = $newreport;
            $jsonUpdated = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            if($jsonUpdated === false || file_put_contents(DATA_DIR.'/json/report.json', $jsonUpdated) === false){
                return_header('/admin/report/?&error=My_Bad');
            }else{
                return_header('/admin/report/', true);
            }
        }else{
            return_header('/admin/report/?error=Fill_All');
        }
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete'){
    if(csrf_gate('report-delete')){
        $data = load_report();
        $key = $_POST['key'];
        unset($data[$key]);
        $jsonUpdated = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        if($jsonUpdated === false || file_put_contents(DATA_DIR.'/json/report.json', $jsonUpdated) === false){
            return_header('/admin/report/?&error=My_Bad');
        }else{
            return_header('/about/report/?message=Successfully_Deleted', true);
        }
    }
}