<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');
require_once(API_DIR.'/new_project.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pThumbnail']) && csrf_gate('pronew')){
    if(!empty($_POST['pName']) || !empty($_POST['pEngName']) || !empty($_POST['pDescription']) || !empty($_POST['pDirName'])){
        $pName = validate($_POST['pName']);
        $pColour = str_replace('#', '', $_POST['pColour']);
        $pEngName = validate($_POST['pEngName']);
        $pDirName = sanitize_dir($_POST['pDirName']);
        $pDescription = validate($_POST['pDescription']);
        if($_FILES['pThumbnail']['error'] == UPLOAD_ERR_OK){
            $filter = ['jpg', 'jpeg,', 'png', 'gif'];
            $ext = strtolower(pathinfo($_FILES['pThumbnail']['name'], PATHINFO_EXTENSION));
            if(in_array($ext, $filter)){
                if($_FILES['pThumbnail']['size'] <= 800000){
                    $tmp = $_FILES['pThumbnail']['tmp_name'];
                    $pThumbnail = $pDirName.'.'.$ext;
                    if(move_uploaded_file($tmp, ROOT_DIR.'/assets/image/main/projects/'.$pThumbnail)){
                        $NewProject = new New_project($pName, $pEngName, $pColour, $pDescription, $pThumbnail, $pDirName);
                        $result = $NewProject->InsertDB();
                        if(!empty($result)){
                            sleep(0.3);
                            return_header('/projects/'.$pDirName.'/');
                        }
                    }else{
                        $_SESSION['newproerr'] = '画像アップロードでサーバーエラーが発生しました。開発者にお問い合わせください。（move_uploaded_file()）';
                        return_header('/admin/projects/new.php?error=Server_Error_In_move_uploaded_files()_Please_Contact_Dev');
                    }
                }else{
                    $_SESSION['newproerr'] = '画像ファイルが大きすぎます！';
                    return_header('/admin/projects/new.php?error=File_Size_Too_Big!');
                }
            }else{
                $_SESSION['newproerr'] = '画像形式のファイルを選択してください';
                return_header('/admin/projects/new.php?error=Unsupported_File_Type');
            }
        }elseif($_FILES['pThumbnail']['error'] == UPLOAD_ERR_NO_FILE){
            $_SESSION['newproerr'] = '画像が選択されていません';
            return_header('/admin/projects/new.php?error=Image_Not_Uploaded');
        }else{
            $_SESSION['newproerr'] = '画像アップロードでサーバーエラーが発生しました。開発者にお問い合わせください。エラー番号：'.$_FILES['pThumbnail']['error'];
            return_header('/admin/projects/new.php?error=Server_Error_In_$_FILES_Please_Contact_Dev');
        }
    }else{
        $_SESSION['newproerr'] = '全ての欄を埋めてください';
        return_header('/admin/projects/new.php?error=Fill_All_Inputs');
    }
    
}