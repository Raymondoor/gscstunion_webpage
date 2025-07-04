<?php namespace Raymondoor\Func;
function jpyear():string{
    return (string)((int)date('Y') - (date('n') < 4 ? 1 : 0));
}
function jpformatWest($date):string{
    $datearr = explode('-', $date);
    if(isset($datearr[1])){
        return $datearr[0].'年'.$datearr[1].'月'.$datearr[2].'日';
    }
    return $date;
}
function dynamic_date_disp($input){
    $date = strtotime($input);
    $now = strtotime(date('Y-m-d'));
    $diff = $now - $date;
    $diffday = floor($diff / (60*60*24));
    if($diffday == 0){
        $disp = '今日';
    }elseif($diffday == 1){
        $disp = '昨日';
    }elseif($diffday <= 7){
        $disp = '1週間前';
    }elseif($diffday <= 30){
        $disp = '今月';
    }elseif($diffday > 30){
        $disp = $input;
    }
    return $disp;
};
function difftoday($input){
    $date = strtotime($input);
    $now = strtotime(date('Y-m-d'));
    $diff = $now - $date;
    $diffday = floor($diff / (60*60*24));
    return $diffday;
};