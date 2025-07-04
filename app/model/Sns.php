<?php namespace Raymondoor\Model;

class Sns extends DBoperation{
    public static function make(){
        try{
            parent::makeTableIfNot('sns',
                parent::create_id().',
                name        TEXT (32) NOT NULL,
                username    TEXT NOT NULL,
                link        TEXT NOT NULL,
                icon        TEXT NOT NULL,'.
                parent::create_time_record()
            );
            return 0;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function drop(){
        parent::dropTableIfIs('sns');
    }
    public static function register(string $name='', string $username='', string $link='', string $icon=''){
        if(empty(self::make())){
            try{
                $query = new DBstatement('INSERT INTO sns (name, username, link, icon) VALUES (:name, :username, :link, :icon)');
                if($query->execute([':name'=>$name,':username'=>$username, ':link'=>$link,':icon'=>$icon])){
                    return 1;
                }
            }catch(\Exception $e){
                // UNIQUE failed
                return -1;
            }
        }else{
            throw new \Exception('couldn\'t make sns table');
        }
    }
    public static function delete($id){
        try{
            $query = new DBstatement('DELETE FROM sns WHERE id = :id');
            return $query->execute([':id' => $id]);
        }catch(\Exception $e){
            return -1;
        }
    }
    public static function all(){
        if(empty(self::make())){
            $query = new DBstatement('SELECT * FROM sns ORDER BY id ASC');
            return $result = $query->execute([]);
        }else{
            throw new \Exception('couldn\'t make sns table');
        }
    }
    public static function sns(string $column='', string $value=''){
        try{
            $stmt = 'SELECT * FROM sns WHERE '.$column.' = :value';
            $query = new DBstatement($stmt);
            $result = $query->execute([':value'=>$value]);
            if(!empty($result)){
                return $result[0];
            }
            return array();
        }catch(\Exception $e){
            throw new \Exception;
        }
    }
}