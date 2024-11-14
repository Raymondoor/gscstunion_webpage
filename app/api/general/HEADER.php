<?php
require_once (__DIR__ . '/LINK.php');
function return_header($uri){
    if (isset($_SERVER['HTTPS'])) {
        header("Location: https://" . $_SERVER['SERVER_NAME'] . ROOT_LINK . $uri);
        exit;
    } else {
        header("Location: http://" . $_SERVER['SERVER_NAME'] . ROOT_LINK . $uri);
        exit;
    }
}

function request_protocol() {
    if (isset($_SERVER['HTTPS'])) {
        return "https://";
    } else {
        return "http://";
    }
}