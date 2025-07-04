<?php namespace Raymondoor\Model;

class Article extends DBoperation{
    public static function make(){
        try{
            parent::makeTableIfNot('articles',
                parent::create_id().',
                title       TEXT (64) NOT NULL,
                date        TEXT (64) NOT NULL,
                main        TEXT,
                thumbnail   TEXT,
                view        INTEGER DEFAULT (1),
                project_id  INTEGER NOT NULL REFERENCES projects (id),
                category_id INTEGER REFERENCES categories (id),'.
                parent::create_time_record()
            );
            return 0;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function drop(){
        parent::dropTableIfIs('articles');
    }
    public static function register(string $title='', string $date='', string $main='', string $thumbnail='', string $projectID='', string $categoryID){
        if(empty(self::make())){
            try{
                $query = new DBstatement('INSERT INTO articles (title, date, main, thumbnail, project_id, category_id) VALUES (:title, :date, :main, :thumbnail, :project_id, :category_id)');
                // not sure if this is right, but 
                if($query->execute([':title'=>$title,':date'=>$date,':main'=>$main,':thumbnail'=>$thumbnail,':project_id'=>$projectID,':category_id'=>$categoryID]) === 1){
                    // will return a nat number
                    return $query->lastInsertId();
                }
                //other fails
                return -2;
            }catch(\Exception $e){
                // UNIQUE failed
                return -1;
            }
        }else{
            throw new \Exception('couldn\'t make articles table');
        }
    }
    public static function delete($id){
        try{
            $query = new DBstatement('DELETE FROM articles WHERE id = :id');
            return $query->execute([':id' => $id]);
        }catch(\Exception $e){
            return -1;
        }
    }
    public static function deleteViaPj(string $column='', string $value=''){
        try{
            // join pid and cid
            $stmt = 'SELECT * FROM articles WHERE '.$column.' = :value';
            $query = new DBstatement($stmt);
            $result = $query->execute([':value'=>$value]);
            if(!empty($result)){
                return $result;
            }
            return array();
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    public static function article(string $column='', string $value=''){
        try{
            // join pid and cid
            $stmt = 'SELECT articles.*, projects.name AS name, projects.color AS color, categories.name AS category FROM articles 
            JOIN projects ON articles.project_id = projects.id 
            JOIN categories ON articles.category_id = categories.id 
            WHERE articles.'.$column.' = :value';
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
    public static function articlesPj(string $column='', string $value=''){
        try{
            // join pid and cid
            $stmt = 'SELECT articles.*, projects.name AS name, projects.color AS color, categories.name AS category FROM articles 
            JOIN projects ON articles.project_id = projects.id 
            JOIN categories ON articles.category_id = categories.id 
            WHERE articles.'.$column.' = :value';
            $query = new DBstatement($stmt);
            $result = $query->execute([':value'=>$value]);
            if(!empty($result)){
                return $result;
            }
            return array();
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    // do I need this?
    public static function update($id, string $name='', string $english='', string $description='', string $color='', string $thumbnail){
        $query = new DBstatement('UPDATE articles SET name = :title, english = :date, description = :main, color = :project_id, thumbnail = :thumbnail WHERE id = :id');
        $result = $query->execute([
            ':title' => $name,
            ':date' => $english,
            ':main' => $description,
            ':project_id' => $color,
            ':thumbnail' => $thumbnail,
            ':id' => $id
        ]);
        return $result;
    }
    public static function all(){
        // join pid and cid
        $query = new DBstatement('SELECT * FROM articles ORDER BY id DESC');
        return $result = $query->execute([]);
    }
    public static function addview($id){
        $query = new DBstatement('UPDATE articles SET view = view + 1 WHERE id = :id');
        $result = $query->execute([
            ':id' => $id
        ]);
        return $result;
    }
}