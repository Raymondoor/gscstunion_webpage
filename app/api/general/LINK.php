<?php
require_once (__DIR__ . '/HEADER.php');
// LINK
// root
define('ROOT_LINK', '/~gscstunion'); // add '/' in front if (!$_SERVER['SERVER_NAME'] == ROOT)
// articles
define('ARTICLES_LINK',  '/articles');
// assets
define('ASSETS_LINK', '/assets');
define('IMAGES_LINK', ASSETS_LINK . '/image');
define('SCRIPT_LINK', ASSETS_LINK . '/script');
define('STYLE_LINK', ASSETS_LINK . '/style');
define('FONT_LINK', STYLE_LINK . '/font');
// URL
// root
define('APP_URL', request_protocol() . $_SERVER['SERVER_NAME'] . ROOT_LINK);
define('FORM_URL', APP_URL . '/app/api/form');
// NETWORK
define('NETWORK_RANGE', '133.2.0.0/16'); // modify