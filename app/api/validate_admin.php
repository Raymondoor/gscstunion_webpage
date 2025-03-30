<?php require_once(__DIR__.'/general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/general/HEADER.php');

function ip_gate(){
    $iprange = '127.0.';
    $v6range = '::1';
    if(strpos($_SERVER['REMOTE_ADDR'], $iprange) === 0 || strpos($_SERVER['REMOTE_ADDR'], $v6range) === 0){
        return true;
    }else{
        return false;
    }
}
function admin_gate(){
    if(ip_gate()){
        if(isset($_SESSION['username'])){
            $sname = $_SESSION['username'];
            $query = new DatabaseStatement("SELECT user.username FROM user WHERE username = :username");
            $list = $query->Operation([':username' => $sname]);
            if(!empty($list)){
                return true;
            }else{
                return_header('/admin/login.php?message=You_Sneaky_Bastard');
            }
        }else{
            return_header('/admin/login.php?message=Login_Required');
        }
    }else{
        return_header('/?error=Valid_Connection_Required');
    }
}
function csrf_gate($message){
    if(!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'], $_POST['csrf'])){
        http_response_code(403);
        $log_data = date("Y-m-d H:i:s").', "at '.$message.'", "'.$_SERVER['HTTP_USER_AGENT'].'", "'.$_SERVER['REMOTE_ADDR'].'"';
        generate_log('/csrf/csrf-', $log_data);
        exit;
    }else {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
        return true;
    }
}