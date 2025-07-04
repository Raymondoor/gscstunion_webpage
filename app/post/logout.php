<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Controller\UserAuth;
use function Raymondoor\Func\htmlmessage;
use function Raymondoor\Func\return_header;

if(UserAuth::logout()){
    htmlmessage();
    return_header('/', true);
}