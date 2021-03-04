<?php
namespace Tests;
use MakechTec\Nanokit\Http\{ HttpRequest, Route, ControllerProcessor };
use MakechTec\Nanokit\Http\RequestEventRegister;
use App\Helpers\H;

class Request implements Testable{
    public $testId;
    

    public function run(){
        $requestEventRegister = new RequestEventRegister();
        //$controllerProcessor = new ControllerProcessor();
        $routeUriTest = new RouteUriTest();

        //$controllerProcessor->setListenerId( 0 );
        $routeUriTest->setListenerId( 0 );

        //$requestEventRegister->register( $controllerProcessor );
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