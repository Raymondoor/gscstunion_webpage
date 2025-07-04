<?php namespace Raymondoor\Controller;

use Exception;
use Raymondoor\Model\User;
use Raymondoor\Model\Project;

class ProjectController{
    public static function new($name, $english, $description, $color, $directory, $thumbfile){
        // db, files
        $thumbimg = $thumbfile['name'];
        $tmpimg = $thumbfile['tmp_name'];
        $extention = pathinfo($thumbimg, PATHINFO_EXTENSION);
        $thumbnail = $directory.'.'.$extention;
        try{
            $result = Project::register($name, $english, $description, $color, $directory, $thumbnail);
            if($result == 1){
                if(!is_dir(PUBLIC_DIR.'/asset/image/main/project/')){
                    mkdir(PUBLIC_DIR.'/asset/image/main/project/', 0755, true);
                }
                if(move_uploaded_file($tmpimg, PUBLIC_DIR.'/asset/image/main/project/'.$thumbnail)){
                    LoggerController::project($name, 1);
                    return true;
                }
            }elseif($result == -1){
                throw new Exception('Not Unique');
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public static function activate($id, $state, $password){
        $pass = User::verifySU();
        if(!password_verify($password, $pass['password'])){
            return false;
        }
        $project = Project::active($id, $state);
        if(empty($project)){
            return false;
        }
        return true;
    }
    public static function order(array $order){
        try{
            foreach($order as $id => $dsporder){
                Project::order($id, $dsporder);
            }
            LoggerController::project('', 4);
            return true;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public static function update($id, string $name='', string $english='', string $description='', string $color='', $thumbfile){
        $project = Project::project('id', $id);
        $same = false;
        try{
            if($thumbfile['error'] === 4){
                $thumbnail = $project['thumbnail'];
                $same = true;
            }else{
                $directory = $project['directory'];
                $thumbimg = $thumbfile['name'];
                $tmpimg = $thumbfile['tmp_name'];
                $extention = pathinfo($thumbimg, PATHINFO_EXTENSION);
                $thumbnail = $directory.'.'.$extention;
            }
            if(Project::update($id, $name, $english, $description, $color, $thumbnail) === 1){
                if(!$same){
                    move_uploaded_file($tmpimg, PUBLIC_DIR.'/asset/image/main/project/'.$thumbnail);
                }
            }
            LoggerController::project($name, 2);
            return true;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public static function delete($id, $password){
        $pass = User::verifySU();
        if(!password_verify($password, $pass['password'])){
            return -2;
        }
        $pj = Project::project('id', $id);
        $thumbnail = $pj['thumbnail'];
        // delete articles
        if(Project::delete($id) === 1){
            if(ArticleController::deleteAll($id, $password) !== 0){
                return -1;
            }
            if(unlink(PUBLIC_DIR.'/asset/image/main/project/'.$thumbnail)){
                LoggerController::project($pj['name'], -1);
                return 0;
            }
            return -1;
        }
        return -1;
    }
}