<?php namespace Raymondoor\Model;
class BrandImage extends DBoperation{
    public static function make(){
        try{
            parent::makeTableIfNot('brndimgs',
                parent::create_id().',
                name        TEXT (64) UNIQUE NOT NULL,
                password    TEXT NOT NULL,'.
                parent::create_time_record()
            );
            return 0;
        }catch(\Exception $e){
            return false;
        }        
    }
    public static function drop(){
        parent::dropTableIfIs('brndimgs');
    }
    public static function register(string $name='', string $email='', string $password=''){
        // if the table doesn't exist, it will make it.
        if(empty(self::make())){
            // if mb_string is available, that will be used
            if(function_exists('mb_trim')){
                $name = mb_trim($name);
                $email = mb_trim($email);
            }
            $name = trim($name);
            $email = trim($email);
            // password will be hashed here
            $password = password_hash($password, PASSWORD_DEFAULT);
            try{
                $query = new DBstatement('INSERT INTO brndimgs (name, email, password) VALUES (:name, :email, :password)');
                return $query->execute([':name'=>$name,':email'=>$email,':password'=>$password]);
            }catch(\Exception $e){
                // UNIQUE failed
                return 1;
            }
        }else{
            return false;
        }
    }
    public static function user(string $name=''){
        try{
            $query = new DBstatement('SELECT * FROM brndimgs WHERE name = :name');
            $result = $query->execute([':name'=>$name]);
            if(!empty($result)){
                return $result[0];
            }
            return array();
        }catch(\Exception){
            throw new \Exception;
        }
    }
}