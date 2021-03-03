<?php
namespace App;

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
