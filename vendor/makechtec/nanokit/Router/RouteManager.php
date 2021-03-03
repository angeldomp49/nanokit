<?php
namespace Router;
use MakechTec\PageManager\Router\Url;
use MakechTec\PageManager\Router\Route;
use MakechTec\PageManager\Http\HttpRequest;
use MakechTec\PageManager\Site;

class RouteManager{

    private static $routes = [];

    /**
     * @param      MakechTec\PageManager\Router\Route      $route         put this into the RouteManager::$routes
     * @return     void
     */

    public static function add(Route $route ){
        
        array_push( self::$routes, $route );
    }

    /**
     * return a Route instance for a specified Url instance
     * 
     * @param      MakechTec\PageManager\Router\Url    $url                 url to test
     * @return     MakechTec\PageManager\Router\Route | null  corresponding route
     */

    public static function findRoute( Url $url ){

        foreach( self::$routes as $route ){

            if( self::testRoute( $route, $url ) ){
                return $route;
            }
            else{
                //do nothing
            }
        }

        return null;
    }

    /**
     * compare an instance of Route and Url and return true if match
     * 
     * @param    MakechTec\PageManager\Router\Url       $url
     * @param    MakechTec\PageManager\Router\Route     $route
     * @return   boolean
     */
    public static function testRoute( Route $route, Url $url ){
        $urlStr   = $url->toString();
        $routeStr = $route->toString();
        $pattern = self::newPattern( $route );

        if( preg_match( $pattern, $urlStr ) == 1 ){
            return true;
        }
        else if( preg_match( $pattern, $urlStr ) == 0 ){
            return false;
        }
        else{
            echo("error ocurred in RouterManager::testRoute");
        }

    }

    public static function newPattern( Route $route ){

        //from {n} to (.*)
        $pattern = preg_replace( '\/\{(.*)\}\/', '/(.*)/', $route->toString() );
        //from /x/ to \/x\/
        $slashesScapeds = preg_replace( '\/', '\/', $pattern );

        return $slashesScapeds;
    }

    /**
     * get the Url params based in the Route
     * 
     * @param    MakechTec\PageManager\Router\Url       $url
     * @param    MakechTec\PageManager\Router\Route     $route
     * @return   array                      the order is the same as the url orden
     */
    public static function getUrlParams(Route $route, Url $url ){
        $params = [];
        $routeSlugs = $route->getSlugs();
        $urlSlugs   = $url->getSlugs();

        for( $i=0; $i <= count( $routeSlugs ) -1; $i++ ){
            if( !strcmp( $routeSlugs, $urlSlugs ) ){
                array_push( $params, $urlSlugs );
            }
            else{
                // do nothing
            }
        }

        return $params;
    }

    public static function openFile( $uri ){
        include( Site::rightPath( $uri ) );
    }

    public static function changeDir( $from, $to, $uri ){

        return str_replace( $from,  $to, $uri );
    }
}


/**
 * 
 * '/example/{n}/example2/'
 * '\/example\/(.*)\/example2\/'
 * '/example/56ajlks/example2/'
 * 
 * 
 * 
 * 
 * 
 */