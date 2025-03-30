<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'new'){
    if(csrf_gate('report-new')){
        if($_FILES['report']['error'] == UPLOAD_ERR_OK){
            if($_FILES['report']['size'] <= 1200000){
                $target = ROOT_DIR.'/about/report/';
                if(move_uploaded_file($_FILES['report']['tmp_name'], $target.$_FILES['report']['name'])){
                    return_header('/about/report/?message=Successfully_Added');
                }else{
                    return_header('/admin/report/?error=Server_Error_In_move_uploaded_files()_Please_Contact_Dev');
                }
            }else{
                return_header('/admin/report/?error=File_Size_Too_Big');
            }
        }else{
            return_header('/admin/report/?error=Upload_Error');
        }
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete'){
    if(csrf_gate('report-delete')){
        $target = ROOT_DIR.'/about/report/';
        $filename = $_POST['filename'];
        if(unlink($target.$filename)){
            return_header('/about/report/?message=Successfully_Deleted');
        }else{
            return_header('/admin/report/?error=Server_Error_In_unlink()_Please_Contact_Dev');
        }
    }
}