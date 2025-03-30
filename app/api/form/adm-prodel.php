<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');
require_once(API_DIR.'/delete_project.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_gate('prodel')){
    $id = $_POST['id'];
    if(!empty($_POST['pName']) && !empty($_POST['password']) && !empty($_POST['id'])){
        $pName = validate($_POST['pName']);
        $password = validate($_POST['password']);
        $query = new DatabaseStatement("SELECT password FROM user WHERE username = :username");
        $result = $query->Operation([':username' => $_SESSION['username']]);
        if(password_verify($password, $result[0]['password'])){
            $query = new DatabaseStatement("SELECT pName, id FROM project WHERE id = :id");
            $data = $query->Operation([':id' => $id]);
            if(!empty($data) && $data[0]['pName'] == $pName){
                $DeleteProject = new Delete_Project($id);
                if($DeleteProject->DeleteDB()){
                    sleep(0.3);
                    return_header('/admin/projects/?message=Successfully_Deleted!');
                }
            }else{
                $_SESSION['delproerr'] = 'プロジェクト名が違います';
                return_header('/admin/projects/delete.php?id='.$id.'&error=Wrong_PJname');
            }
        }else{
            $_SESSION['delproerr'] = 'パスワードが違います';
            return_header('/admin/projects/delete.php?id='.$id.'&error=Wrong_Password');
        }
    }else{
        $_SESSION['delproerr'] = '全ての欄を埋めてください';
        return_header('/admin/projects/delete.php?id='.$id.'&error=Fill_All_Inputs');
    }
}