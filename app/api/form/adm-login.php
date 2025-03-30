<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_gate('login')){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        // Validate
        $username = str_rot13(validate($_POST['username']));
        $password = validate($_POST['password']);
        // Fetch data from DB
        $query = new DatabaseStatement("SELECT * FROM user WHERE username = :username");
        $result = $query->Operation([':username' => $username]);
        // Check username
        if($result[0]['username'] === $username){
            if(password_verify($password, $result[0]['password'])){
                $_SESSION['username'] = $username;
                $log_data = date("Y-m-d H:i:s").', '.$_SERVER['HTTP_SEC_CH_UA_PLATFORM'].', "'.$_SERVER['HTTP_USER_AGENT'].'", "'.$_SERVER['REMOTE_ADDR'].'"';
                generate_log('/login/login-', $log_data);
                unset($_SESSION['chance']);
                return_header('/admin/?message=Welcome!');
            }else{
                $_SESSION['chance']++;
                if($_SESSION['chance'] === 5){
                    $_SESSION['over'] = true;
                    return_header('/admin/login.php?error=Cannot_Try_Anymore');
                }
                $_SESSION['loginerr'] = 'パスワードが違います '.$_SESSION['chance'].'回目';
                return_header('/admin/login.php?error=Wrong_Password');
            }
        }else{
            $_SESSION['loginerr'] = 'ユーザー名が違います';
            return_header('/admin/login.php?error=Wrong_Username');
        }
    }else{
        $_SESSION['loginerr'] = '全ての欄を埋めてください';
        return_header('/admin/login.php?error=Fill_All_Blanks');
    }
}