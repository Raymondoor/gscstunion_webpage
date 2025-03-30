<?php
define('ROOT_DIR', realpath(__DIR__.'/../../../'));

define('APP_DIR', realpath(ROOT_DIR.'/app/'));
define('API_DIR', realpath(APP_DIR.'/api/'));
define('SCRIPT_DIR', realpath(APP_DIR.'/api/script/'));
define('DATA_DIR', realpath(APP_DIR.'/data/'));
define('DATABASE_DIR', realpath(DATA_DIR.'/database.db'));

define('ARTICLES_DIR', realpath(ROOT_DIR.'/articles/'));
define('PROJECTS_DIR', realpath(ROOT_DIR.'/projects/'));
define('TEMPLATE_DIR', realpath(APP_DIR.'/templates/'));

define('STYLE_DIR', realpath(ROOT_DIR.'/assets/style/'));

date_default_timezone_set('Asia/Tokyo');