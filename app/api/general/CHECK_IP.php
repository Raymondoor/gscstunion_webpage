<?php
function ip_in_range($ip, $range) {
    if ($ip === '::1' || $ip === '127.0.0.1') {
        return $ip;
    }
    list($network, $mask) = explode('/', $range);
    $ip_long = ip2long($ip);
    $network_long = ip2long($network);
    $mask_long = bindec(str_pad('', $mask, '1') . str_pad('', 32-$mask, '0'));
    return ($ip_long & $mask_long) == ($network_long & $mask_long);
}