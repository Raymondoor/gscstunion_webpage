<?php namespace Raymondoor\Func;

function generate_log($name, $data){
    $dir = DATA_DIR.DIRECTORY_SEPARATOR.'log'.dirname($name);
    if(!is_dir($dir)){mkdir($dir, 0755, true);}
    $filename = $dir.DIRECTORY_SEPARATOR.basename($name).date('Y-m').'.csv';
    $file = fopen($filename, 'a');
    if($file){fwrite($file, $data.PHP_EOL);fclose($file);}
}