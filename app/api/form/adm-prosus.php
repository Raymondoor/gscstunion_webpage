<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_gate('prosus')){
    if(!empty($_POST['pName']) || !empty($_POST['password']) || !empty($_POST['id'])){
        $pName = validate($_POST['pName']);
        $id = $_POST['id'];
        $password = validate($_POST['password']);
        $query = new DatabaseStatement("SELECT password FROM user WHERE username = :username");
        $result = $query->Operation([':username' => $_SESSION['username']]);
        if(password_verify($password, $result[0]['password'])){
            $query = new DatabaseStatement("SELECT pName, id FROM project WHERE id = :id");
            $data = $query->Operation([':id' => $id]);
            if(!empty($data) && $data[0]['pName'] == $pName){
                $query = new DatabaseStatement("UPDATE project SET pIsActive = :pIsActive WHERE id = :id");
                if($_POST['pIsActive'] == 1){
                    $result = $query->Operation([':pIsActive' => 0, ':id' => $id]);
                }elseif($_POST['pIsActive'] == 0){
                    $result = $query->Operation([':pIsActive' => 1, ':id' => $id]);
                }
                if($result > 0){
                    $log_data = date("Y-m-d H:i:s").', SUS, "'.$data[0]['pName'].'"';
                    generate_log('/project/project-', $log_data);
                    return_header('/admin/projects/');
                }else{
                    $_SESSION['susproerr'] = 'サーバーエラーが発生しました。';
                    return_header('/admin/projects/edit.php?id='.$id.'&error=Server_Gone_Wrong');
                }
            }else{
                $_SESSION['susproerr'] = 'プロジェクト名が違います';
                return_header('/admin/projects/edit.php?id='.$id.'&error=Wrong_PJname');
            }
        }else{
            $_SESSION['susproerr'] = 'パスワードが違います';
            return_header('/admin/projects/edit.php?id='.$id.'&error=Wrong_Password');
        }
    }else{
        $_SESSION['susproerr'] = '全ての欄を埋めてください';
        return_header('/admin/projects/edit.php?id='.$id.'&error=Fill_All_Inputs');
    }
}