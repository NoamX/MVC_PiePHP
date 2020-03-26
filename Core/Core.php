<?php

namespace Core;

class Core
{
    public function run()
    {
        echo __CLASS__ . " [OK]<br>";
        echo 'REDIRECT_URL : ' . $_SERVER['REDIRECT_URL'] . '<br>';
        $arr = explode('/', $_SERVER['REDIRECT_URL']);
        $class = ucfirst($arr[4]) . 'Controller';
        $method = $arr[5] . 'Action';
        echo "Action : $class -> $method<br>";
        $controller = new $class;
        $controller->$method();
    }
}
