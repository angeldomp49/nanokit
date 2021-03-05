<?php
namespace Tests;
use MakechTec\Nanokit\Http\{ HttpRequest, Route, ControllerProcessor };
use MakechTec\Nanokit\Http\RequestEvent;
use App\Helpers\H;

class Request implements Testable{
    public $testId;
    

    public function run(){
        $requestEventRegister = new RequestEvent();
        $routeUriTest = new RouteUriTest();
        $routeUriTest->setListenerId( 0 );
        $requestEventRegister->register( $routeUriTest );
        $requestEventRegister->launch();
    }

    public function getTestId(){
        return $this->testId;
    }

    public function setTestId($testId){
        $this->testId = $testId;

        return $this;
    }
}