<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/validate_admin.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_gate('content')){
    $details = $_POST['content'];
    $main = $_POST[$details];
    if($html = fopen(DATA_DIR.'/content/'.$details.'.html', 'w')){
        if(fwrite($html, $main)){
            if(fclose($html)){
                return_header('/admin/edit/content.php?message=Success!');
            }
        }
    }
}