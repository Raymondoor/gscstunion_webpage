<?php namespace Raymondoor\Config;
// Main (Local Path)
define('ROOT_DIR', realpath(__DIR__.'/../../')); // '/'
define('APP_DIR', ROOT_DIR.DIRECTORY_SEPARATOR.'app'); // '/app'
define('CONFIG_DIR', APP_DIR.DIRECTORY_SEPARATOR.'config'); // '/app/config'
define('DATA_DIR', APP_DIR.DIRECTORY_SEPARATOR.'data'); // '/app/data'
define('VIEW_DIR', APP_DIR.DIRECTORY_SEPARATOR.'view'); // '/app/data'
define('POST_DIR', APP_DIR.DIRECTORY_SEPARATOR.'post'); // '/app/post'
define('PUBLIC_DIR', ROOT_DIR.DIRECTORY_SEPARATOR.'');

// URL
const HOME_PATH = '/~gscstunion'; // Leave blank if host is the root point. Add '/' in head if is not. e.g. '/myapp' This will map https://domain.com/myapp as home path.
define('HOME_URL', (isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['SERVER_NAME'].HOME_PATH);
define('CURRENT_URL', (isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
define('ASSET_URL',HOME_URL.'/asset');
define('IMAGE_URL',ASSET_URL.'/image');
define('STYLE_URL',ASSET_URL.'/style');
define('SCRIPT_URL',ASSET_URL.'/script');
define('POST_URL',HOME_URL.'/post.php?p=');
define('ADMIN_URL', HOME_URL.'/admin');

// App
define('APP_NAME', 'GSC学生連合');
// Allow access only from school
define('IPV4_RANGE', ''); // set your own
define('IPV6_RANGE', '');

// google oauth
define('GOOGLE_CLIENT_ID', '');
define('GOOGLE_CLIENT_SECRET', '');
define('GOOGLE_REDIRECT_URI', ADMIN_URL.'/google.php');

date_default_timezone_set('Asia/Tokyo');
/* for local debug
ini_set('display_errors', '1');
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/