<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');
require_once(API_DIR.'/edit_project.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_gate('proedt')){
    if(!empty($_POST['pName']) || !empty($_POST['pEngName']) || !empty($_POST['pDescription'])){
        $pName = validate($_POST['pName']);
        $pColour = str_replace('#', '', $_POST['pColour']);
        $pEngName = validate($_POST['pEngName']);
        $pDescription = validate($_POST['pDescription']);
        $pDirName = $_POST['pDirName'];
        $id = $_POST['id'];
        if(isset($_POST['imgswap']) && $_POST['imgswap'] == 1){
            if($_FILES['pThumbnail']['error'] == UPLOAD_ERR_OK){
                $filter = ['jpg', 'jpeg', 'png', 'gif'];
                $ext = pathinfo(basename($_FILES['pThumbnail']['name']), strtolower(PATHINFO_EXTENSION));
                if(in_array(strtolower($ext), $filter)){
                    if($_FILES['pThumbnail']['size'] <= 800000){
                        $tmp = $_FILES['pThumbnail']['tmp_name'];
                        $pThumbnail = $pDirName.'.'.$ext;
                        $query = new DatabaseStatement('SELECT project.pThumbnail FROM project WHERE id = :id');
                        $data = $query->Operation([':id' => $id]);
                        $pOldThumbnail = $data[0]['pThumbnail'];
                        $oldPath = ROOT_DIR.'/assets/image/main/projects/'.$pOldThumbnail;
                        $oldContent = file_get_contents($oldPath);
                        unlink($oldPath);
                        if(move_uploaded_file($tmp, ROOT_DIR.'/assets/image/main/projects/'.$pThumbnail)){
                            $editProject = new Edit_project($pName, $pEngName, $pColour, $pDescription, $pThumbnail, $id);
                            $result = $editProject->UpdateDB();
                            if(!empty($result)){
                                sleep(0.3);
                                return_header('/projects/'.$pDirName.'/', true);
                            }
                        }else{
                            $handle = fopen($oldPath, 'w');
                            fwrite($handle, $oldContent);
                            fclose($oldPath);
                            $_SESSION['editproerr'] = '画像アップロードでサーバーエラーが発生しました。開発者にお問い合わせください。（move_uploaded_file()）';
                            return_header('/admin/projects/edit.php?id='.$id.'&error=Server_Error_In_move_uploaded_files()_Please_Contact_Dev');    
                        }
                    }else{
                        $_SESSION['editproerr'] = '画像ファイルが大きすぎます！';
                        return_header('/admin/projects/edit.php?id='.$id.'&error=File_Size_Too_Big!');
                    }
                }else{
                    $_SESSION['editproerr'] = '正しい形式のファイルを選択してください'.pathinfo(basename($_FILES['pThumbnail']['name']), PATHINFO_EXTENSION).$_FILES['pThumbnail']['name'];;
                    return_header('/admin/projects/edit.php?id='.$id.'&error=Unsupported_File_Type');
                }
            }elseif($_FILES['pThumbnail']['error'] == UPLOAD_ERR_NO_FILE){
                $_SESSION['editproerr'] = '画像が選択されていません';
                return_header('/admin/projects/edit.php?id='.$id.'&error=Image_Not_Uploaded');
            }else{
                $_SESSION['editproerr'] = '画像アップロードでサーバーエラーが発生しました。開発者にお問い合わせください。エラー番号：'.$_FILES['pThumbnail']['error'];
                return_header('/admin/projects/edit.php?id='.$id.'&error=Server_Error_In_$_FILES_Please_Contact_Dev');
            }
        }elseif(!isset($_POST['imgswap'])){
            $query = new DatabaseStatement('SELECT project.pThumbnail FROM project WHERE id = :id');
            $result = $query->Operation([':id' => $id]);
            $pOldThumbnail = $result[0]['pThumbnail'];
            $editProject = new Edit_project($pName, $pEngName, $pColour, $pDescription, $pOldThumbnail, $id);
            $result = $editProject->UpdateDB();
            if(!empty($result)){
                sleep(0.3);
                return_header('/projects/'.$pDirName);
            }
        }else{
            $_SESSION['editproerr'] = '馬鹿な真似はよしなさい！';
            return_header('/admin/projects/edit.php?id='.$id.'&error=Stop_Fingering_The_HTML_You_Muppet');
        }
    }else{
        $_SESSION['editproerr'] = '全ての欄を埋めてください';
        return_header('/admin/projects/edit.php?id='.$id.'&error=Fill_All_Inputs');
    }
}