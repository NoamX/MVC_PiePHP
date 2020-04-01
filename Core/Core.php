<?php

namespace Core;

use Core\Router;

class Core
{
    public function run()
    {
        // echo '<p>' .__CLASS__ . ' [OK]</p>';
        require_once 'src/routes.php';
        $static = explode('MVC_PiePHP', $_SERVER['REDIRECT_URL']);
        if (($route = Router::get($static[1])) != null) {
            $class = 'Controller\\' . ucfirst($route['controller']) . 'Controller';
            $method = $route['action'] . 'Action';
            // echo "<p>$class -> $method</p>";
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
                        // echo "<p>$class -> $method</p>";
                        $controller->$method();
                    } else
                        echo '404';
                } else
                    echo '404';
            } elseif (preg_match('%(app|user)%', $url[4]) || isset($url[4]) && !isset($url[5])) {
                if ($url[4] != '') {
                    $class = 'Controller\\' . ucfirst($url[4]) . 'Controller';
                    if (class_exists($class)) {
                        // echo "<p>$class -> indexAction</p>";
                        $controller = new $class();
                        $controller->indexAction();
                    } else
                        echo '404';
                }
            }
        }
    }
}
