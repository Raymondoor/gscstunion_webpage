<?php require_once(__DIR__.'/HEADER.php');
define('HOME_PATH',''); // if(!$_SERVER['SERVER_NAME'] == ROOT){'/' + dirname}
define('APP_URL',request_protocol().$_SERVER['SERVER_NAME'].HOME_PATH);

define('ARTICLES_URL',APP_URL.'/articles');
define('PAGE_URL',ARTICLES_URL.'/page');
define('PROJECTS_URL',APP_URL.'/projects');
define('TIMELINE_URL',APP_URL.'/timeline');

define('ASSETS_URL',APP_URL.'/assets');
define('IMAGES_URL',ASSETS_URL.'/image');
define('STYLE_URL',ASSETS_URL.'/style');
define('SCRIPT_URL',ASSETS_URL.'/script');
define('FONT_URL',STYLE_URL.'/font');

define('FORM_URL',APP_URL.'/app/api/form');