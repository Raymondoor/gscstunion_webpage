<?php namespace Raymondoor\Controller;

use Exception;
use Raymondoor\Model\Sns;
use function Raymondoor\Func\clean_str;

class SnsController{
    public static function new($name, $username, $link, $iconfile){
        // db, files
        $thumbimg = $iconfile['name'];
        $tmpimg = $iconfile['tmp_name'];
        $extention = pathinfo($thumbimg, PATHINFO_EXTENSION);
        $iconname = clean_str($name);
        $icon = $iconname.'.'.$extention;
        try{
            $result = Sns::register($name, $username, $link, $icon);
            if($result == 1){
                if(!is_dir(PUBLIC_DIR.'/asset/image/share/sns/')){
                    mkdir(PUBLIC_DIR.'/asset/image/share/sns/', 0755, true);
                }
                if(move_uploaded_file($tmpimg, PUBLIC_DIR.'/asset/image/share/sns/'.$icon)){
                    LoggerController::sns($name, 1);
                    return true;
                }elseif($result == -1){
                    throw new Exception('Image Transfer Error');
                }
            }elseif($result == -1){
                throw new Exception('Not Unique');
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public static function delete($id){
        $sns = Sns::sns('id', $id);
        $icon = $sns['icon'];
        // delete
        if(Sns::delete($id) === 1){
            if(unlink(PUBLIC_DIR.'/asset/image/share/sns/'.$icon)){
                LoggerController::sns($sns['name'], -1);
                return true;
            }
            return -1;
        }
        return -1;
    }
}