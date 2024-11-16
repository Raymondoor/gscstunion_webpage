<?php
require_once (__DIR__ . '/DIR.php');

function generate_log ($name, $data) {
    $dir = DATA_DIR . DIRECTORY_SEPARATOR . 'log' . dirname($name);
    if(!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $filename = $dir . DIRECTORY_SEPARATOR . basename($name) . date('Y-m') . '.csv';
    $file = fopen($filename, 'a');
    if($file) {
        fwrite($file, $data . PHP_EOL);
        fclose($file);
    }
}
/*
$log_data = "";
generate_log('/dir/filename-', $log_data);
*/