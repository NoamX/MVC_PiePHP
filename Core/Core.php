<?php

namespace Core;

use Core\Router;

class Core
{
    public function run()
    {
        echo __CLASS__ . ' [OK]<br>';
        require_once 'src/routes.php';
        $static = explode('MVC_PiePHP', $_SERVER['REDIRECT_URL']);
        if (($route = Router::get($static[1])) != null) {
            $class = 'Controller\\' . ucfirst($route['controller']) . 'Controller';
            $method = $route['action'] . 'Action';
            echo "$class -> $method<br>";
            $controller = new $class();
            $controller->$method();
        } else {
            $url = explode('/', $_SERVER['REDIRECT_URL']);
            if (isset($url[4], $url[5])) {
                $class = 'Controller\\' . ucfirst($url[4]) . 'Controller';

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
                } else
                    echo '404';
            } elseif (preg_match('%(app|user)%', $url[4]) || isset($url[4]) && !isset($url[5])) {
                if ($url[4] != '') {
                    $class = 'Controller\\' . ucfirst($url[4]) . 'Controller';
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
