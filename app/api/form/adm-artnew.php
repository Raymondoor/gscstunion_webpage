<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/DATABASE_PROCESS.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/validate_admin.php');
require_once(API_DIR.'/new_article.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_gate('artnew')){
    if(!empty($_POST['projectid']) && !empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['main'])){
        if(!empty($_POST['hid']) || !empty($_POST['newhash'])){
            // hashtag process here
            if(!empty($_POST['hid'])){
                $hid = $_POST['hid'];
            }elseif(!empty($_POST['newhash'])){
                $newhash = $_POST['newhash'];
                $query = new DatabaseStatement("SELECT * FROM hashtag WHERE hName = :hName");
                $hashexist = $query->Operation([':hName' => $newhash]);
                if(!empty($hashexist)){
                    $hid = $hashexist[0]['id'];
                }else{
                    $query = new DatabaseStatement("INSERT INTO hashtag (hName) VALUES (:hName)");
                    $insertedhash = $query->Operation([':hName' => $newhash]);
                    $hid = $query->lastInsertId();
                }
            }
            if($_FILES['thumbnail']['error'] == UPLOAD_ERR_OK){
                $filter = ['jpg', 'jpeg,', 'png', 'gif'];
                $ext = strtolower(pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION));
                if(in_array($ext, $filter)){
                    if($_FILES['thumbnail']['size'] <= 800000){
                        $tmp = $_FILES['thumbnail']['tmp_name'];
                        $thumbnail = time().'.'.$ext;

                        $projectid = $_POST['projectid'];
                        $title = validate($_POST['title']);
                        $date = validate($_POST['date']);
                        $main = $_POST['main'];

                        $targetDir = ROOT_DIR.'/assets/image/main/articles/main/';
                        if(!file_exists($targetDir)){
                            mkdir($targetDir, 0755);
                        }
                        $baseImgUrl = '<?=IMAGES_URL?>/main/articles/main/';
                        preg_match_all('/<img[^>]+src=["\'](data:image\/[^;]+;base64,[^"\']+)["\']/i', $main, $match);
                        if(!empty($match[1])){
                            foreach($match[1] as $index => $base64src){
                                $base64string = explode(',', $base64src)[1];
                                $imageData = base64_decode($base64string);
                                $mimeType = explode(';', explode(':', $base64src)[1])[0];
                                $mainext = str_replace('image/', '', $mimeType);
                                $filename = time().'_'.$index.'.'.$mainext;
                                $filePath = $targetDir.$filename;
                                if(file_put_contents($filePath, $imageData)){
                                    $newImgUrl = $baseImgUrl.$filename;
                                    $main = str_replace($base64src, $newImgUrl, $main);
                                }
                            }
                        }
                        if(move_uploaded_file($tmp, ROOT_DIR.'/assets/image/main/articles/thumbnail/'.$thumbnail)){
                            $NewArticle = new New_Article($title, $date, $main, $thumbnail, $projectid, $hid);
                            $result = $NewArticle->InsertDB();
                            if(!empty($result)){
                                sleep(0.3);
                                return_header('/articles/page/'.$result.'.php');
                            }
                        }else{
                            $_SESSION['newarterr'] = '画像アップロードでサーバーエラーが発生しました。開発者にお問い合わせください。（move_uploaded_file()）';
                            return_header('/admin/articles/new.php?error=Server_Error_In_move_uploaded_files()_Please_Contact_Dev');    
                        }
                    }else{
                        $_SESSION['newarterr'] = '画像ファイルが大きすぎます！';
                        return_header('/admin/articles/new.php?error=File_Size_Too_Big!');
                    }
                }else{
                    $_SESSION['newarterr'] = '画像形式のファイルを選択してください';
                    return_header('/admin/articles/new.php?error=Unsupported_File_Type');
                }
            }elseif($_FILES['thumbnail']['error'] == UPLOAD_ERR_NO_FILE){
                $_SESSION['newarterr'] = 'サムネイル画像が選択されていません';
                return_header('/admin/articles/new.php?error=Image_Not_Uploaded');
            }else{
                $_SESSION['newarterr'] = '画像アップロードでサーバーエラーが発生しました。開発者にお問い合わせください。エラー番号：'.$_FILES['thumbnail']['error'];
                return_header('/admin/articles/new.php?error=Server_Error_In_$_FILES_Please_Contact_Dev');
            }
        }else{
            $_SESSION['newarterr'] = 'カテゴリを選択または新しく追加してください';
            return_header('/admin/articles/new.php?error=Category_Required');
        }
    }else{
        $_SESSION['newarterr'] = '全ての欄を埋めてください';
        return_header('/admin/articles/new.php?error=Fill_All_Inputs');
    }
    
}