<?php
spl_autoload_register(function ($class) {
    $paths = [
        'Core/',
        'src/Controller/',
        'src/Model/',
    ];

    foreach ($paths as $path) {
        $file = $path . basename($class) . '.php';
        if (file_exists($file))
            require_once $file;
    }
});
