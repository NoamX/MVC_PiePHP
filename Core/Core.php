<?php

namespace Core;

class Core
{
    public function run()
    {
        echo __CLASS__ . ' [OK]<br>';
        echo $_SERVER['REDIRECT_URL'] . '<br>';
        $arr = explode('/', $_SERVER['REDIRECT_URL']);

        if ($arr[4] && $arr[5]) {
            $class = ucfirst($arr[4]) . 'Controller';
            $method = $arr[5] . 'Action';
            echo "Class : $class; Method : $method<br>";
            $controller = new $class();
            $controller->$method();
            // Appelé la methode indexAction de la classe UserController
        }
    }
}