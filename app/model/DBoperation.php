<?php namespace Raymondoor\Model;

class DBoperation{
    public static function allFrom(string $table){
        try{
            $statement = 'SELECT * FROM '.$table.' ORDER BY id ASC';
            $query = new DBstatement($statement);
            return $query->execute([]);
        }catch(\Exception $e){
            return array('No such table');
        }
    }
    public static function makeTableIfNot(string $table, string $schema){
        if(empty($table) || empty($schema)){
            throw new \Exception('Table name and schema cannot be empty.');
        }
        $query = new DBstatement("CREATE TABLE IF NOT EXISTS {$table} ({$schema})");
        return $query->exec();
    }
    public static function dropTableIfIs(string $table){
        try{
            $statement = 'DROP TABLE IF EXISTS '.$table;
            $query = new DBstatement($statement);
            return $query->execute([]);
        }catch(\Exception $e){
            return array('No such table');
        }
    }
    // useful column presets. make sure to add ',' before/after calling these methods if needed.
    protected static function create_id(){
        switch(DBconnection::gettype()){
            case 1:
                return 'id INTEGER PRIMARY KEY AUTOINCREMENT';
                break;
            case 2:
                return 'id INT AUTO_INCREMENT PRIMARY KEY';
                break;
            case 3:
                return 'id SERIAL PRIMARY KEY';
                break;
        }
    }
    protected static function create_time_record(){
        switch(DBconnection::gettype()){
            case 1:
                return 'created_at DATETIME DEFAULT (DATETIME(\'now\', \'localtime\'))';
                break;
            case 2:
                return 'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP';
                break;
            case 3:
                return 'created_at TIMESTAMP DEFAULT NOW()';
                break;
        }
    }
}