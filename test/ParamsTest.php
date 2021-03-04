<?php
namespace Tests;
use MakechTec\Nanokit\Interfaces\EventListener;
use MakechTec\Nanokit\Http\Route;
use App\Helpers\H;

class ParamsTest implements EventListener{
    private $listenerId;

    public function handleEvent( $request ){
        $currentRoute = Route::currentRoute( $request );
        $currentRoute->generateParameters( $request );

        echo( var_dump( $currentRoute->getParameters() ) );
    }

    public function getListenerId(){
        return $this->listenerId;
    }

    public function setListenerId($listenerId){
        $this->listenerId = $listenerId;

        return $this;
    }
}