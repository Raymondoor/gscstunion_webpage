<?php namespace Raymondoor\Model;

class Report extends DBoperation{
    public static function make(){
        try{
            parent::makeTableIfNot('reports',
                parent::create_id().',
                year    INTEGER NOT NULL,
                type    INTEGER NOT NULL,
                title    TEXT NOT NULL,
                link   TEXT NOT NULL,'.
                parent::create_time_record()
            );
            return 0;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function drop(){
        parent::dropTableIfIs('reports');
    }
    public static function register(string $year='', string $type='', string $title='', string $link=''){
        if(empty(self::make())){
            try{
                $query = new DBstatement('INSERT INTO reports (year, type, title, link) VALUES (:year, :type, :title, :link)');
                if($query->execute([':year'=>$year,':type'=>$type,':title'=>$title,':link'=>$link])){
                    return 1;
                }
            }catch(\Exception $e){
                // UNIQUE failed
                return -1;
            }
        }else{
            throw new \Exception('couldn\'t make reports table');
        }
    }
    public static function delete($id){
        try{
            $query = new DBstatement('DELETE FROM reports WHERE id = :id');
            return $query->execute([':id' => $id]);
        }catch(\Exception $e){
            return -1;
        }
    }
    public static function all(){
        if(empty(self::make())){
            $query = new DBstatement('SELECT * FROM reports ORDER BY id ASC');
            return $result = $query->execute([]);
        }else{
            throw new \Exception('couldn\'t make reports table');
        }
    }
    public static function report(string $column='', string $value=''){
        try{
            $stmt = 'SELECT * FROM reports WHERE '.$column.' = :value';
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