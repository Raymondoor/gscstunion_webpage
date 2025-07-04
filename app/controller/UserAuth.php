<?php namespace Raymondoor\Controller;
require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Model\User;
use function Raymondoor\Func\app_removecookie;
use function Raymondoor\Func\return_header;

class UserAuth{
    // su
	public static function registerSU($name, $password){
		$result = User::insertSU($name, $password);
		if($result === 1){
			//log here
			return true;
		}
		return false;
	}
	public static function useradd(string $email){
        $email = strtolower($email);
		$result = User::allowGU($email);
		if($result === 1){
			LoggerController::GU($email, 1);
			return true;
		}elseif($result === 2){
            return true;
        }
		return false;
	}
	public static function userrm(string $email){
		$result = User::disallowGU($email);
		if($result === 1){
			LoggerController::GU($email, -1);
			return true;
		}elseif($result === 2){
            return true;
        }
		return false;
	}
    public static function loginSU(string $name='', string $password='', bool $keep=false){
        try{
            $userdata = User::user($name);
            if(!empty($userdata)){
                if(password_verify($password, $userdata['password'])){
                    // success
                    $_SESSION[APP_NAME]['user'] = array('logged' => true, 'name' => $name, 'super' => true);
                    LoggerController::login($name);
                    return 0;
                }else{
                    // wrong password
                    return 2;
                }
            }
            // wrong name
            return 1;
        }catch(\Exception $e){
            throw new \Exception($e);
        }
    }
    public static function loginGU($prov, $uid, $name, $email, $picture){
        try{
            if(!User::isAllowedGU($email)){
                // not allowed
                return 1;
            }
            $userdata = User::user($email);
            if(empty($userdata)){
                User::insertGU($prov, $uid, $name, $email, $picture);
                $_SESSION[APP_NAME]['user'] = array('logged' => true, 'name' => $name, 'picture' => $picture, 'super' => false);
                LoggerController::login($name);
                // success
                return 0;
            }else{
                User::updateGU($prov, $uid, $name, $email, $picture);
                $_SESSION[APP_NAME]['user'] = array('logged' => true, 'name' => $name, 'picture' => $picture, 'super' => false);
                LoggerController::login($name);
                // success
                return 0;
            }
        }catch(\Exception $e){
            throw new \Exception($e);
        }
    }
    public static function logout(){
        //verify state first, then
        try{
            app_removecookie('user');
            LoggerController::logout($_SESSION[APP_NAME]['user']['name']);
            unset($_SESSION[APP_NAME]['user']);
            return true;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function is(){
        if(isset($_SESSION[APP_NAME]['user'])){
            return $_SESSION[APP_NAME]['user'];
        }
        return false;
    }
    public static function logged(){
        if(isset($_SESSION[APP_NAME]['user'])){
            return $_SESSION[APP_NAME]['user']['logged'];
        }
        return false;
    }
    public static function ip_gate(){
        if(empty(IPV4_RANGE) && empty(IPV6_RANGE)){
            return true;
        }else{
            if(strpos($_SERVER['REMOTE_ADDR'], IPV4_RANGE) === 0 || strpos($_SERVER['REMOTE_ADDR'], IPV6_RANGE) === 0){
                return true;
            }else{
                return false;
            }
        }
    }
    public static function admin_gate(){
        if(!static::ip_gate()){
            return_header();
        }
        $user = static::is();
        if(!empty($user)){
            $userdata = User::user($user['name']);
            if(!empty($userdata)){
                return true;
            }
        }
        return_header();
    }
    public static function csrf_gate(){
        if(!isset($_POST['csrf_token']) || !hash_equals($_SESSION[APP_NAME]['csrf'], $_POST['csrf_token'])){
            http_response_code(403);
            unset($_SESSION[APP_NAME]);
            LoggerController::csrf();
            return_header();
            return false;
        }else{
            return true;
        }
    }
}