<?php
function sanitize_dir($input) {
    // Remove invalid characters
    $sanitized_name = preg_replace('/[\/:*?"<>|]/', '', $input);
    
    // Trim whitespace
    $sanitized_name = trim($sanitized_name);
    
    // Optionally limit the length
    $sanitized_name = substr($sanitized_name, 0, 255); // Adjust length as needed

    return $sanitized_name;
}
function attach_link($input) {
    // Regular expression to match URLs
    $pattern = '/(https?:\/\/[^\s]+[^.,;:\s])/';
    
    // Replace matched URLs with clickable <a> tags
    $input_with_links = preg_replace($pattern, '<a href="$0" target="_blank" id="contentlink">$0</a>', $input);
    
    return $input_with_links;
}
function sanitize_text($input) {
    $trim = trim($input);
    $unescape = stripslashes($trim);
    $output = htmlspecialchars($unescape);
    return $output;
}