<?php require_once(__DIR__.'/../general/DIR.php');
require_once(API_DIR.'/general/HEADER.php');
require_once(API_DIR.'/general/FORMAT_TEXT.php');
require_once(API_DIR.'/general/LOG.php');
require_once(API_DIR.'/load_content.php');
require_once(API_DIR.'/validate_admin.php');

session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update']) && csrf_gate('sns')){
    $newinput = [];
    $oldTag = $_POST['oldTag'];
    $oldSNS = load_sns();
    if(isset($_POST[$oldTag]['Delete'])){
        unset($oldSNS[$oldTag]);
        $jsonUpdated = json_encode($oldSNS, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        if($jsonUpdated === false || file_put_contents(DATA_DIR.'/json/SNS.json', $jsonUpdated) === false){
            return_header('/admin/edit/sns.php?id='.$oldTag.'&error=My_Bad');
        }else{
            return_header('/admin/edit/sns.php', true);
        }
    }
    $tag = $_POST[$oldTag]['Tag'];
    $title = $_POST[$oldTag]['Title'];
    $username = $_POST[$oldTag]['Username'];
    $link = $_POST[$oldTag]['Link'];
    $newinput[$tag] = [
        'Title' => $title,
        'Username' => $username,
        'Link' => $link,
    ];
    if(isset($_POST[$oldTag]['Swap'])){
        $newIcon = $_FILES['newIcon'];
        if($newIcon['error'] === UPLOAD_ERR_OK){
            $ext = pathinfo($newIcon['name'], PATHINFO_EXTENSION);
            $tmp = $newIcon['tmp_name'];
            $oldicon = ROOT_DIR.'/assets/image/share/sns/'.$oldSNS[$oldTag]['Icon'];
            $oldcontent = file_get_contents($oldicon);
            unlink($oldicon);
            if(move_uploaded_file($tmp, ROOT_DIR.'/assets/image/share/sns/'.$tag.'.'.$ext)){
                $icon = $tag.'.'.$ext;
                $newinput[$tag]['Icon'] = $icon;
            }else{
                $handle = fopen($oldicon, 'w');
                fwrite($handle, $oldcontent);
                fclose($handle);
                return_header('/admin/edit/sns.php?id='.$oldTag.'&error=Image_Upload_Error_On_Move');
            }
        }else{
            return_header('/admin/edit/sns.php?id='.$oldTag.'&error=Image_Upload_Error'.$newIcon['error']);
        }
    }else{
        $icon = $oldSNS[$oldTag]['Icon'];
        $newinput[$tag]['Icon'] = $icon;
    }
    if(array_key_exists($oldTag, $oldSNS)){
        if($oldTag !== $tag){
            $oldSNS[$tag] = $newinput[$tag];
            unset($oldSNS[$oldTag]);
        }else{
            $oldSNS[$oldTag] = $newinput[$tag];
        }
    }else{
        return_header('/admin/edit/sns.php?message=Add_New_If_You_Desparately_Want_It');
    }
    $jsonUpdated = json_encode($oldSNS, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    if($jsonUpdated === false || file_put_contents(DATA_DIR.'/json/SNS.json', $jsonUpdated) === false){
        return_header('/admin/edit/sns.php?id='.$oldTag.'&error=My_Bad');
    }else{
        return_header('/admin/edit/sns.php', true);
    }
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newsns']) && csrf_gate('sns')){
    foreach($_POST['new'] as $var => $elm){
        if(empty($elm)){
            return_header('/admin/edit/sns.php?error=To_Add_New_Social_'.$var.'_Is_Required');
        }
    }
    $existingsns = load_sns();
    $newsns = [];
    $newtag = $_POST['new']['Tag'];
    $newtitle = $_POST['new']['Title'];
    $newusername = $_POST['new']['Username'];
    $newlink = $_POST['new']['Link'];
    $newicon = $_FILES['newIcon'];
    if($newicon['error'] === UPLOAD_ERR_OK){
        $ext = pathinfo($newicon['name'], PATHINFO_EXTENSION);
        $tmp = $newicon['tmp_name'];
        if(move_uploaded_file($tmp, ROOT_DIR.'/assets/image/share/sns/'.$newtag.'.'.$ext)){
            $newicon = $newtag.'.'.$ext;
            $newinput[$newtag] = [
                'Title' => $newtitle,
                'Username' => $newusername,
                'Link' => $newlink,
                'Icon' => $newicon,
            ];
            $existingsns[$newtag] = $newinput[$newtag];
            $jsonUpdated = json_encode($existingsns, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            if($jsonUpdated === false || file_put_contents(DATA_DIR.'/json/SNS.json', $jsonUpdated) === false){
                return_header('/admin/edit/sns.php?error=My_Bad');
            }else{
                return_header('/admin/edit/sns.php', true);
            }
        }else{
            return_header('/admin/edit/sns.php?error=Image_Upload_Error_On_Move');
        }
    }else{
        return_header('/admin/edit/sns.php?error=Image_Upload_Error'.$newIcon['error']);
    }
}