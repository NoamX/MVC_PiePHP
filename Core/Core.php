<?php

namespace Core;

use Router;

class Core
{

    public function run()
    {
        echo __CLASS__ . ' [OK]<br>';
        require_once 'src/routes.php';
        $array = explode('/', $_SERVER['REDIRECT_URL']);
        if (Router::get('/' . end($array)) != null) {
            echo 'Here<br>';
        } else {
            $url = explode('/', $_SERVER['REDIRECT_URL']);
            if (isset($url[4], $url[5])) {
                $class = ucfirst($url[4]) . 'Controller';

                if ($url[5] == '')
                    $method = 'indexAction';
                else
                    $method = $url[5] . 'Action';

                if (class_exists($class)) {
                    $controller = new $class();
                    if (method_exists($controller, $method)) {
                        echo "$class -> $method<br>";
                        $controller->$method();
                    } else
                        echo '404';
                }
            } elseif (preg_match('%(app|user)%', $url[4]) || isset($url[4]) && !isset($url[5])) {
                if ($url[4] != '') {
                    $class = ucfirst($url[4]) . 'Controller';
                    if (class_exists($class)) {
                        echo "$class -> indexAction<br>";
                        $controller = new $class();
                        $controller->indexAction();
                    } else
                        echo '404';
                }
            }
        }
    }
}
