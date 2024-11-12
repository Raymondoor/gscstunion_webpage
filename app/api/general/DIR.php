<?php
// DIRECTORY
// App
// root
define('ROOT_DIR', realpath(__DIR__ . '/../../../'));
// app
define('APP_DIR', realpath(ROOT_DIR . '/app/'));
// data
define('DATA_DIR', realpath(APP_DIR . '/data/'));
// database
define('DATABASE_DIR', realpath(DATA_DIR . '/database.db'));
// api
define('API_DIR', realpath(APP_DIR . '/api/'));
// View
// articles
define('ARTICLES_DIR', realpath(ROOT_DIR . '/articles/'));
// template
define('TEMPLATE_DIR', realpath(APP_DIR . '/templates/'));