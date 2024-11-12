<?php
require_once (__DIR__ . '/general/DIR.php');

function list_seo () {
    $Brand = file_get_contents(DATA_DIR . '/SEO.json');
    return json_decode($Brand, true);
}