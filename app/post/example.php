<?php
use Raymondoor\Model\Example;
use function Raymondoor\function\return_header;

require_once(__DIR__.'/../../vendor/autoload.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cmd = $_POST['cmd'];
    if($cmd == 'make'){
        // Usually you don't make a table based on user requests, this is just to show how models work in this app.
        Example::make();
        return_header('/example/');
    }elseif($cmd == 'seed'){
        Example::seed(10);
        return_header('/example/');
    }elseif($cmd == 'drop'){
        Example::drop();
        return_header('/example/');
    }
}