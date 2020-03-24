<?php
spl_autoload_register(function ($class) {
    $path = substr(__DIR__, 0, -strlen(basename(__DIR__)));
    $ext = '.php';
    $fullpath = $path . $class . $ext;
    if (!file_exists($fullpath)) {
        $path .= 'src\\';
        $fullpath = $path . $class . $ext;
    }
    require_once $fullpath;
});