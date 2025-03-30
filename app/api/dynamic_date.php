<?php require_once(__DIR__.'/general/DIR.php');

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