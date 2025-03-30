<?php require_once(__DIR__.'/general/DIR.php');
require_once(API_DIR.'/general/LINK.php');
require_once(API_DIR.'/general/HEADER.php');

function zip_log(string $name = DATA_DIR.'/tmp/log.zip'){
    $logfolder = DATA_DIR.'/log';
    $zip = new ZipArchive();
    if($zip->open($name, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE){
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($logfolder),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach($files as $file){
            if(!$file->isDir()){
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($logfolder) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return true;
    }else{
        return false;
    }
}