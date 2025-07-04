<?php namespace Raymondoor\Func;
function darkenHexColor(string $hex, float $percent = 0.2): string {
    // Remove leading '#' if present
    $hex = ltrim($hex, '#');

    // Expand short form (#abc) to full form (#aabbcc)
    if (strlen($hex) == 3) {
        $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
    }

    // Convert HEX to RGB
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    // Apply darkening
    $r = max(0, min(255, (int)($r * (1 - $percent))));
    $g = max(0, min(255, (int)($g * (1 - $percent))));
    $b = max(0, min(255, (int)($b * (1 - $percent))));

    // Convert back to HEX
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}
