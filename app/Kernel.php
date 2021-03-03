<?php
namespace App;

require_once( '../nanokit/vendor/autoload.php' );
require_once( '../nanokit/app/helpers.php' );
require_once( '../nanokit/app/functions.php' );
require_once( '../nanokit/app/routes.php' );

use MakechTec\Nanokit\Http\{HttpRequest, Route};
use MakechTec\Nanokit\Http\ControllerProcessor;

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
