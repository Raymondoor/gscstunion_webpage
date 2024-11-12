<?php
require_once (__DIR__ . '/HEADER.php');
// LINK
// root
define('ROOT_LINK', '');
define('APP_LINK', request_protocol() . $_SERVER['SERVER_NAME']);
// articles
define('ARTICLES_LINK', ROOT_LINK . '/articles');
// assets
define('ASSETS_LINK', ROOT_LINK . '/assets');
define('IMAGES_LINK', ASSETS_LINK . '/image');
define('SCRIPT_LINK', ASSETS_LINK . '/script');
define('STYLE_LINK', ASSETS_LINK . '/style');
define('FONT_LINK', STYLE_LINK . '/font');