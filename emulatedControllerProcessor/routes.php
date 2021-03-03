<?php

class Route{
    public static $routes;


    public static function register( $uri, $controllerInfo ){
        $route = [
            $uri,
            $controllerInfo
        ];
        self::$routes[] = $route;
    }

    public static function first(){
        return self::$routes[0];
    }
}