<?php namespace Raymondoor\Model;
class Logger extends DBoperation{
    /*
    ~level column explanation~
        It follows the Syslog (RFC 5424) protocol, but with added levels 8-11
        Brief explanation of syslog below, see https://www.rfc-editor.org/rfc/rfc5424#page-11 and more for further details.
            (0: Emergency, 1: Alert, 2: Critical, 3: Error, 4: Warning, 5: Notice, 6: Informational, 7: Debug)
        The custom 8-11 are for to notice a non-developer (normal user)
            (8: INSERT operation taken, 9: UPDATE operation taken, 10: DELETE operation taken, 11: user logged in/out to/from admin)
    ~name column explanation~
        It's just to reference what the log is about, such as "login" if a user logged in or "contact" if there was a contact request
    */
    public static function make(){
        try{
            parent::makeTableIfNot('log',
                parent::create_id().',
                name TEXT,
                level INTEGER,
                message TEXT,'.
                parent::create_time_record()
            );
            return 0;
        }catch(\Exception $e){
            return false;
        }
    }
    public static function log(string $name, int $level=6, $message){
        if(empty(static::make())){
            $query = new DBstatement('INSERT INTO log (name, level, message) VALUES (:name, :level, :message)');
            return $query->execute([':name' => $name, ':level' => $level, ':message' => $message]);
        }
    }
    public static function all(){
        if(empty(self::make())){
            $query = new DBstatement('SELECT * FROM log ORDER BY id DESC');
            return $query->execute([]);
        }
    }
    public static function allForDisp(){
        if(empty(self::make())){
            $query = new DBstatement('SELECT * FROM log WHERE level NOT IN (7, 11) ORDER BY id DESC LIMIT 40');
            return $query->execute([]);
        }
    }
}