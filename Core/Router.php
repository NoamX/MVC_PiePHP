<?php

class Router
{
    private static $routes;
    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
        $route;
    }

    public static function get($url)
    {
        echo 'router/get';
        echo '<pre>';
        echo 'URL : ';
        var_dump($url);
        echo 'ROUTES : ';
        var_dump(self::$routes);
        echo '</pre>';
        // retourne un tableau associatif contenant
        // - le controller a instancier
        // - la methode du controller a appeler
    }
}
