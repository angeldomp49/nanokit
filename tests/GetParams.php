<?php
namespace Tests;

use MakechTec\Nanokit\Interfaces\EventListener;
use MakechTec\Nanokit\Http\Route;

class GetParams implements EventListener{
    private $listenerId;

    public function handleEvent( $request ){
        $currentRoute = Route::currentRoute( $request );
        echo( var_dump( $currentRoute->getParameters() ) );
    }

    public function __construct( $listenerId ){
        $this->listenerId = $listenerId;
    }

    public function getListenerId(){
        return $this->listenerId;
    }

    public function setListenerId($listenerId){
        $this->listenerId = $listenerId;

        return $this;
    }
}