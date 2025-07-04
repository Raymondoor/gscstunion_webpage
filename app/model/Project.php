<?php namespace Raymondoor\Model;

class Project extends DBoperation{
    public static function make(){
        try{
            parent::makeTableIfNot('projects',
                parent::create_id().',
                name        TEXT (64) UNIQUE NOT NULL,
                english     TEXT (64) NOT NULL,
                description TEXT,
                color       TEXT (12),
                directory   TEXT (32) UNIQUE NOT NULL,
                thumbnail   TEXT,
                active      INTEGER NOT NULL DEFAULT (1),
                display_order       INTEGER'
            );
            return 0;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function drop(){
        parent::dropTableIfIs('projects');
    }
    public static function register(string $name='', string $english='', string $description='', string $color='', string $directory='', string $thumbnail){
        if(empty(self::make())){
            try{
                $query = new DBstatement('INSERT INTO projects (name, english, description, color, directory, thumbnail) VALUES (:name, :english, :description, :color, :directory, :thumbnail)');
                // affected rows, will return 1
                return $query->execute([':name'=>$name,':english'=>$english,':description'=>$description,':color'=>$color,':directory'=>$directory,':thumbnail'=>$thumbnail]);
            }catch(\Exception $e){
                // UNIQUE failed
                return -1;
            }
        }else{
            throw new \Exception('couldn\'t make table');
        }
    }
    public static function delete($id){
        try{
            $query = new DBstatement('DELETE FROM projects WHERE id = :id');
            return $query->execute([':id' => $id]);
        }catch(\Exception $e){
            return -1;
        }
    }
    public static function project(string $column='', string $value=''){
        try{
            $stmt = 'SELECT * FROM projects WHERE '.$column.' = :value';
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
    public static function update($id, string $name='', string $english='', string $description='', string $color='', string $thumbnail){
        $query = new DBstatement('UPDATE projects SET name = :name, english = :english, description = :description, color = :color, thumbnail = :thumbnail WHERE id = :id');
        $result = $query->execute([
            ':name' => $name,
            ':english' => $english,
            ':description' => $description,
            ':color' => $color,
            ':thumbnail' => $thumbnail,
            ':id' => $id
        ]);
        return $result;
    }
    public static function active($id, $state = 1 | 0){
        $query = new DBstatement('UPDATE projects SET active = :active WHERE id = :id');
        $result = $query->execute([
            ':active' => $state,
            ':id' => $id
        ]);
        return $result;
    }
    public static function all(){
        $query = new DBstatement('SELECT * FROM projects WHERE ACTIVE = 1 ORDER BY display_order ASC');
        return $result = $query->execute([]);
    }
    public static function trueAll(){
        $query = new DBstatement('SELECT * FROM projects ORDER BY display_order ASC');
        return $result = $query->execute([]);
    }
    public static function allarchive(){
        $query = new DBstatement('SELECT * FROM projects WHERE ACTIVE = 0 ORDER BY display_order ASC');
        return $result = $query->execute([]);
    }
    public static function order($id, $order){
        $query = new DBstatement('UPDATE projects SET display_order = :order WHERE id = :id');
        return $result = $query->execute([':order' => $order, ':id' => $id]);
    }
}