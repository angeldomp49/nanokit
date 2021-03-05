<?php
namespace App;

use MakechTec\Nanokit\Http\{HttpRequest, Route, RequestEvent, ControllerProcessor};
use MakechTec\Nanokit\Database\DB;

class Kernel{
    public static $request;
    public static $currentRoute;
    public static $globalItems;

    public static function runApplication(){
        $requestEv = new RequestEvent();

        $controllerProcessor = new ControllerProcessor(0);
        $requestEv->register( $controllerProcessor );

        $dbconnection = new DB(1);
        $requestEv->register( $dbconnection );

        

        $requestEv->launch();
    }

}
