<?php
spl_autoload_register(function ($class) {
    $path = 'Core/';
    $ext = '.php';
    $fullpath = $path . basename($class) . $ext;    
    if (!file_exists($fullpath)) {
        $path = 'src/Model/';
        $fullpath = $path . basename($class) . $ext;
    }
    if (!file_exists($fullpath)) {
        $path = 'src/View/';
        $fullpath = $path . basename($class) . $ext;
    }
    if (!file_exists($fullpath)) {
        $path = 'src/Controller/';
        $fullpath = $path . basename($class) . $ext;
    }
    require_once $fullpath;
});
