<?php
namespace App;

require_once( '../vendor/autoload.php' );
require_once( 'helpers.php' );
require_once( 'routes.php' );

use MakechTec\Http\HttpRequest;
use MakechTec\Http\ControllerProcessor;

class Kernel{
    public static $request;
    public static $currentRoute;
    public static $globalItems;

    public static function runApplication(){
        self::$request = new HttpRequest();
        self::$currentRoute = Route::currentRoute( self::$request );
        $processor = new ControllerProcessor();

        $processor->runControllerFromRoute( self::$currentRoute );
    } 
}
