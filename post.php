<?php require_once(__DIR__.'/vendor/autoload.php');
use function Raymondoor\Func\return_header;
if($_SERVER['REQUEST_METHOD']!=='POST'){
    return_header('', true);exit;
};
if(isset($_GET['p'])){
    $handler = basename($_GET['p']);
    $file = POST_DIR.DIRECTORY_SEPARATOR.$handler.'.php';
    try{
        require_once($file);
    }catch(\Throwable $e){
        http_response_code(404);
        $_SESSION[APP_NAME]['htmlmessage'] = $e->getMessage();
        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit('Handler not found');
    }
}else{
    header('Location: '.$_SERVER['HTTP_REFERER']);
    return_header('/');
}