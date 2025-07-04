<?php namespace Raymondoor\Func;

function pageconfig(array $setting = []): array {
    \App::set(array_merge(\App::$PAGE, $setting));
    return \App::$PAGE;
}