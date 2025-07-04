<?php namespace Raymondoor\Controller;

use Exception;
use Raymondoor\Model\Report;

class ReportController{
    public static function new($year, $type, $title, $link){
        try{
            $result = Report::register($year, $type, $title, $link);
            if($result == 1){
                LoggerController::report($year, $title, 1);
                return true;
            }elseif($result == -1){
                throw new Exception('Not Unique');
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    public static function delete($id){
        $rp = Report::report('id', $id);
        // delete
        if(Report::delete($id) === 1){
            LoggerController::report($rp['year'], $rp['title'], -1);
            return true;
        }
        return -1;
    }
}