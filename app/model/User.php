<?php namespace Raymondoor\Model;
class User extends DBoperation{
    public static function make(){
        try{
            parent::makeTableIfNot('allowed_users',
                parent::create_id().',
                email TEXT UNIQUE,'.
                parent::create_time_record()
            );
            parent::makeTableIfNot('users',
                parent::create_id().',
                oauth_provider TEXT,
                oauth_uid TEXT,
                name TEXT,
                email TEXT UNIQUE,
                picture BLOB,
                password TEXT,'.
                parent::create_time_record()
            );
            return 0;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function drop(){
        parent::dropTableIfIs('allowed_users');
        return parent::dropTableIfIs('users');
    }
    public static function isAllowedGU(string $email){
		if(empty(self::make())){
			$email = trim($email);
			$query = new DBstatement('SELECT * FROM allowed_users WHERE email = :email');
			$result = $query->execute([':email' => $email]);
			if(!empty($result)){
				return true;
			}
			return false;
		}
	}
    public static function allAllowedGU(){
		if(empty(self::make())){
			$query = new DBstatement('SELECT * FROM allowed_users ORDER BY ID ASC');
			$result = $query->execute([]);
			if(!empty($result)){
				return $result;
			}
			return array();
		}
	}
    public static function allowGU(string $email){
		if(empty(self::make())){
			if(self::isAllowedGU($email)){
				return 2;
			}else{
				$email = trim($email);
				$query = new DBstatement('INSERT INTO allowed_users (email) VALUES (:email)');
				return $query->execute([':email' => $email]);
			}
		}
	}
	public static function disallowGU(string $email){
		if(empty(self::make())){
			if(!self::isAllowedGU($email)){
				return 2;
			}else{
				$email = trim($email);
				$query = new DBstatement('DELETE FROM allowed_users WHERE email = :email');
				return $query->execute([':email' => $email]);
			}
		}
	}
    public static function user(string $identifier=''){
        if(empty(self::make())){
            try{
                $query = new DBstatement('SELECT * FROM users WHERE name = :id OR email = :id');
                $result = $query->execute([':id'=>$identifier]);
                if(!empty($result)){
                    return $result[0];
                }
                return array();
            }catch(\Exception $e){
                throw new \Exception;
            }
        }
    }
    public static function insertSU(string $name, string $password){
		if(empty(self::make())){
            if(function_exists('mb_trim')){
                $name = mb_trim($name);
            }
            $name = trim($name);
			$query = new DBstatement('INSERT INTO users (name, password) VALUES (:name, :password)');
			return $query->execute([
				':name' => $name,
				':password' => password_hash($password, PASSWORD_DEFAULT)
			]);
		}
	}
    public static function updateSU(string $name, string $password){
		$query = new DBstatement('UPDATE users SET name = :name, password = :password) WHERE id = 1');
		return $query->execute([
			':name' => $name,
			':password' => password_hash($password, PASSWORD_DEFAULT)
		]);
	}
    public static function getSU($name){
        $query = new DBstatement('SELECT * FROM users WHERE name = :name AND password IS NOT NULL');
        $result = $query->execute([':name' => $name]);
        return $result[0] ?? [];
    }
	public static function verifySU(){
        $query = new DBstatement('SELECT * FROM users WHERE password IS NOT NULL');
        $result = $query->execute([]);
        return $result[0] ?? [];
    }
    public static function insertGU($prov, $uid, $name, $email, $picture){
		if(empty(self::make())){
			$query = new DBstatement('INSERT INTO users (oauth_provider, oauth_uid, name, email, picture) VALUES (:oauth_provider, :oauth_uid, :name, :email, :picture)');
			return $query->execute([
				':oauth_provider' => $prov,
				':oauth_uid' => $uid,
				':name' => $name,
				':email' => $email,
				':picture' => $picture
			]);
		}
	}
    public static function updateGU($prov, $uid, $name, $email, $picture){
		$query = new DBstatement('UPDATE users SET oauth_provider = :oauth_provider, oauth_uid = :oauth_uid, name = :name, email = :email, picture = :picture WHERE email = :email');
		return $query->execute([
			':oauth_provider' => $prov,
			':oauth_uid' => $uid,
			':name' => $name,
			':email' => $email,
			':picture' => $picture
		]);
	}
    public static function loginOAuth($provider, $uid, $email, $name = '', $picture = null){
        self::make(); // Ensure table exists

        $query = new DBstatement('SELECT * FROM users WHERE email = :email');
        $result = $query->execute([':email' => $email]);
        //what if I instead did this of the above
        /*
        $result = self::user($email);
        */
        if (!empty($result)) {
            $query = new DBstatement('UPDATE users SET name = :name, oauth_provider = :provider, oauth_uid = :uid, picture = :pic WHERE email = :email');
            $query->execute([':name'=>$name, ':provider'=>$provider, ':uid'=>$uid, ':pic'=>$picture, ':email'=>$email]);
            // I want to use static update() function instead.
        } else {
            $query = new DBstatement('INSERT INTO users (name, email, oauth_provider, oauth_uid, picture) VALUES (:name, :email, :provider, :uid, :pic)');
            $query->execute([':name'=>$name, ':email'=>$email, ':provider'=>$provider, ':uid'=>$uid, ':pic'=>$picture]);
            // can I use the static register() function here instead?
        }
        return self::user($email);
    }
}