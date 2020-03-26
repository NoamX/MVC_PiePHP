<?php
spl_autoload_register(function ($class) {
    $paths = ['.' . DIRECTORY_SEPARATOR . 'Core', '.' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Controller', '.' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Model'];
    foreach ($paths as $value) {
        $fullpath = $value . strstr($class, DIRECTORY_SEPARATOR) . '.php';
        if (file_exists($fullpath)) {
            require_once($fullpath);
        }
    }
});
