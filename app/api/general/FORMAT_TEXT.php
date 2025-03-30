<?php require_once(__DIR__.'/DIR.php');
require_once(API_DIR.'/htmlpurifier/HTMLPurifier.auto.php');

function sanitize_dir($input){
    $sanitized_name = preg_replace('/[\/:*?"<>|]/', '', $input);
    $sanitized_name = trim($sanitized_name);
    $sanitized_name = str_replace(' ', '', $sanitized_name);
    $sanitized_name = substr($sanitized_name, 0, 63); // Adjust length as needed
    return $sanitized_name;
}
function validate($input){
    $trim = trim($input);
    $unescape = stripslashes($trim);
    $output = htmlspecialchars($unescape);
    return $output;
}
function attach_link($input){
    $pattern = '/(https?:\/\/[^\s]+[^.,;:\s])/';
    
    $input_with_links = preg_replace($pattern, '<a href="$0" target="_blank" id="contentlink">$0</a>', $input);
    
    return $input_with_links;
}
function remove_style($iframe){
    $cleanedHtml = preg_replace('/style="[^"]*"/', '', $iframe);

    return $cleanedHtml;
}
function sanitize_main($main){
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.AllowedElements', []);
    $config->set('HTML.AllowedAttributes', []);
    $purifier = new HTMLPurifier($config);
    $clean = $purifier->purify($main);
    return $clean;
}
function URL_replace($main){
    $main = str_replace('<?=IMAGES_URL?>', IMAGES_URL, $main);
    return $main;
}