<?php namespace Raymondoor\Model;

class Category extends DBoperation{
    public static function make(){
        try{
            parent::makeTableIfNot('categories',
                parent::create_id().',
                name    TEXT UNIQUE,'.
                parent::create_time_record()
            );
            return 0;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function drop(){
        parent::dropTableIfIs('categories');
    }
    public static function register(string $name=''){
        if(empty(self::make())){
            try{
                $check = self::category('name', $name);
                if(!empty($check)){
                    return $check['id'];
                }
                $query = new DBstatement('INSERT INTO categories (name) VALUES (:name)');
                $query->execute([':name'=>$name]);
                // return the inserted id
                return (int) $query->lastInsertId();
            }catch(\Exception $e){
                // UNIQUE failed
                return -1;
            }
        }else{
            throw new \Exception('couldn\'t make categories table');
        }
    }
    public static function delete($id){
        try{
            $query = new DBstatement('DELETE FROM categories WHERE id = :id');
            return $query->execute([':id' => $id]);
        }catch(\Exception $e){
            return -1;
        }
    }
    public static function category(string $column='', string $value=''){
        try{
            $stmt = 'SELECT * FROM categories WHERE '.$column.' = :value';
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
    public static function all(){
        if(empty(self::make())){
            $query = new DBstatement('SELECT * FROM categories ORDER BY id ASC');
            return $result = $query->execute([]);
        }else{
            throw new \Exception('couldn\'t make table');
        }
    }
}