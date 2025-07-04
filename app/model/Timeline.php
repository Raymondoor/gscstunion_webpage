<?php namespace Raymondoor\Model;

class Timeline extends DBoperation{
    public static function make(){
        try{
            parent::makeTableIfNot('timeline',
                parent::create_id().',
                name        TEXT (32) NOT NULL,
                message     TEXT NOT NULL,'.
                parent::create_time_record()
            );
            return 0;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function drop(){
        parent::dropTableIfIs('timeline');
    }
    public static function register(string $name='', string $message=''){
        if(empty(self::make())){
            try{
                $query = new DBstatement('INSERT INTO timeline (name, message) VALUES (:name, :message)');
                if($query->execute([':name'=>$name,':message'=>$message])){
                    return $query->lastInsertId();
                }
            }catch(\Exception $e){
                // UNIQUE failed
                return -1;
            }
        }else{
            throw new \Exception('couldn\'t make timeline table');
        }
    }
    public static function delete($id){
        try{
            $query = new DBstatement('DELETE FROM timeline WHERE id = :id');
            return $query->execute([':id' => $id]);
        }catch(\Exception $e){
            return -1;
        }
    }
    public static function all(){
        if(empty(self::make())){
            $query = new DBstatement('SELECT * FROM timeline ORDER BY id DESC');
            return $result = $query->execute([]);
        }else{
            throw new \Exception('couldn\'t make timeline table');
        }
    }
    public static function timeline_index(string $limit=''){
        if(empty(self::make())){
            if(!empty($limit)){
                $limit = ' LIMIT '.$limit;
            }
            $stmt = 'SELECT * FROM timeline ORDER BY id DESC'.$limit;
            $query = new DBstatement($stmt);
            return $query->execute([]);
        }
    }
}