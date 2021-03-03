<?php
namespace Tests;
use MakechTec\Nanokit\Http\{ HttpRequest, Route };
use App\Helpers\H;

class Request implements Testable{
    public $testId;
    

    public function run(){
        $request = new HttpRequest();
        $currentRoute = Route::currentRoute( $request );
        echo( var_dump( $currentRoute ) );
    }

    public function getTestId(){
        return $this->testId;
    }

    public function setTestId($testId){
        $this->testId = $testId;

        return $this;
    }
}