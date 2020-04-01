<?php

namespace Core;

class Controller
{
<<<<<<< HEAD
    protected static $_render;
=======
    public static $_render;

>>>>>>> 086c5391f80deacad037b09aff6743bcb2bd54d6
    protected function render($view, $scope = [])
    {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';
        if (file_exists($f)) {
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start();
            $test = include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            var_dump($test);
            self::$_render = ob_get_clean();
            return self::$_render;
        }
    }
<<<<<<< HEAD
    public function __destruct()
    {
        echo self::$_render;
    }
=======

    
>>>>>>> 086c5391f80deacad037b09aff6743bcb2bd54d6
}
