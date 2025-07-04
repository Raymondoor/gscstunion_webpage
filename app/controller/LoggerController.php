<?php namespace Raymondoor\Controller;

use Raymondoor\Model\Logger;
class LoggerController{
    public static function login($info){
        Logger::log('LOGIN', 11, '"'.$info.'"がログインしました。');
    }
    public static function logout($info){
        try{
            Logger::log('LOGOUT', 11, '"'.$info.'"がログアウトしました。');
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    public static function GU($email, int $state){
        if($state === 1){
            Logger::log('MKUSER', 8, '"'.$email.'"が登録されましました。');
        }elseif($state === -1){
            Logger::log('RMUSER', 10, '"'.$email.'"が削除されましました。');
        }
    }
    public static function csrf(){
        Logger::log('CSRF', 4, 'CSRFが検出されました。');
    }
    public static function project($pj='', int $state){
        if($state === 1){
            // new
            Logger::log('MKPJ', 8, '"'.$pj.'"PJが登録されましました。');
        }elseif($state === -1){
            // delete
            Logger::log('RMPJ', 10, '"'.$pj.'"PJが削除されましました。');
        }elseif($state === 2){
            // edit
            Logger::log('EDTPJ', 9, '"'.$pj.'"PJが編集されましました。');
        }elseif($state === 3){
            // activate
            Logger::log('ACTPJ', 9, '"'.$pj.'"PJが再開されましました。');
        }elseif($state === -3){
            // deactivate
            Logger::log('DEACTPJ', 9, '"'.$pj.'"PJが活動停止されましました。');
        }elseif($state === 4){
            // order
            Logger::log('ORDPJ', 9, 'PJの表示順が変更されましました。');
        }
    }
    public static function article(int $id, int $state){
        if($state === 1){
            // new
            Logger::log('MKART', 8, '新しい記事が投稿されましました。 id='.$id);
        }elseif($state === -1){
            // delete
            Logger::log('RMART', 10, '記事が削除されましました。 id='.$id);
        }
    }
    public static function timeline(int $id, int $state){
        if($state === 1){
            // new
            Logger::log('MKTML', 8, '新しいタイムラインが投稿されましました。 id='.$id);
        }elseif($state === -1){
            // delete
            Logger::log('RMTML', 10, 'タイムラインが削除されましました。 id='.$id);
        }
    }
    public static function about(string $type){
        if($type === 'about'){
            $section = '私たちについて';
        }elseif($type === 'policy'){
            $section = '各種方針';
        }elseif($type === 'license'){
            $section = '規約・ライセンス';
        }
        Logger::log('EDTABT', 9, '「'.$section.'」が更新されましました。');
    }
    public static function base(){
        Logger::log('EDTBASE', 9, '基本情報が更新されましました。');
    }
    public static function sns(string $name, int $state){
        if($state === 1){
            Logger::log('MKSNS', 8, '「'.$name.'」のソーシャルアカウントが登録されましました。');
        }elseif($state === -1){
            // delete
            Logger::log('RMSNS', 10, '「'.$name.'」のソーシャルアカウントが削除されましました。');
        }
    }
    public static function report(string $year, string $title, int $state){
        if($state === 1){
            Logger::log('MKRPT', 8, $year.'年度末書類「'.$title.'」が登録されましました。');
        }elseif($state === -1){
            Logger::log('RMRPT', 10, $year.'年度末書類「'.$title.'」が削除されましました。');
        }
    }
}