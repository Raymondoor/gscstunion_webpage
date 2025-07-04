<?php namespace Raymondoor\Controller;

use Exception;
use Raymondoor\Model\User;
use Raymondoor\Model\Article;

class ArticleController{
    public static function new($title, $date, $main, $thumbfile, $projectID, $categoryID){
        // db, files
        $thumbimg = $thumbfile['name'];
        $tmpimg = $thumbfile['tmp_name'];
        $extention = pathinfo($thumbimg, PATHINFO_EXTENSION);
        $filename = time().rand(1, 50);
        $thumbnail = $filename.'.'.$extention;
        try{
            $result = Article::register($title, $date, $main, $thumbnail, $projectID, $categoryID);
            // change to not empty if returned val is lastInsertId
            if($result > 0){
                if(!is_dir(PUBLIC_DIR.'/asset/image/main/article/')){
                    mkdir(PUBLIC_DIR.'/asset/image/main/article/', 0755, true);
                }
                if(move_uploaded_file($tmpimg, PUBLIC_DIR.'/asset/image/main/article/'.$thumbnail)){
                    LoggerController::article($result, 1);
                    return true;
                }else{
                    throw new Exception('Can\'t add thumbnail');
                }
            }elseif($result == -1){
                throw new Exception('Not Unique');
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public static function update($id, string $name='', string $english='', string $description='', string $color='', $thumbfile){
        $project = Article::article('id', $id);
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
            if(Article::update($id, $name, $english, $description, $color, $thumbnail) === 1){
                if(!$same){
                    move_uploaded_file($tmpimg, PUBLIC_DIR.'/asset/image/main/article/'.$thumbnail);
                }
            }
            LoggerController::article($name, 2);
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
        $art = Article::article('id', $id);
        $thumbnail = $art['thumbnail'];
        // delete articles
        if(Article::delete($id) === 1){
            if(unlink(PUBLIC_DIR.'/asset/image/main/article/'.$thumbnail)){
                LoggerController::article($art['id'], -1);
                return 0;
            }
            return -1;
        }
        return -1;
    }
    public static function deleteAll($pid, $password){
        $pass = User::verifySU();
        if(!password_verify($password, $pass['password'])){
            return -2;
        }
        $arts = Article::deleteViaPj('project_id', $pid);
        foreach($arts as $art){
            $thumbnail = $art['thumbnail'];
            // delete articles
            if(Article::delete($art['id']) === 1){
                if(unlink(PUBLIC_DIR.'/asset/image/main/article/'.$thumbnail)){
                    LoggerController::article($art['id'], -1);
                }
                else{
                    return -1;
                }
            }else{
                return -1;
            }
        }
        return 0;
    }
}