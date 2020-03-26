<?php
spl_autoload_register(function ($class) {
    $paths = ['./Core', './src/Controller', './src/Model'];
    foreach ($paths as $value) {
        $fullpath = $value . strstr($class, '\\') . '.php';
        if (file_exists($fullpath)) {
            require_once($fullpath);
        }
    }
});
