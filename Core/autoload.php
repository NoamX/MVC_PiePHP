<?php
spl_autoload_register(function ($class) {
    $path = '.' . DIRECTORY_SEPARATOR;
    $ext = '.php';
    $fullpath = $path . $class . $ext;
    if (!file_exists($fullpath)) {
        $path .= 'src' . DIRECTORY_SEPARATOR;
        $fullpath = $path . $class . $ext;
    }
    require_once $fullpath;
});