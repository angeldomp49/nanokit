<?php
namespace App;

use MakechTec\Nanokit\Http\{HttpRequest, Route, RequestEventRegister, ControllerProcessor};
use Tests\ParamsTest;

class Kernel{
    public static $request;
    public static $currentRoute;
    public static $globalItems;

    public static function runApplication(){
        $requestEv = new RequestEventRegister();

        //$controllerProcessor = new ControllerProcessor( 0 );
        //$requestEv->register( $controllerProcessor );

        $paramsTest = new ParamsTest( 1 );
        $requestEv->register( $paramsTest );


        $requestEv->launch();
    }

}
