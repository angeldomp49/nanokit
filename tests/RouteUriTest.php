<?php
namespace Tests;

class RouteUriTest implements EventListener{
    private $listenerId;

    public function handleEvent( $request ){
        echo('inside RouteUriTest');
    }

    public function getListenerId(){
        return $this->listenerId;
    }

    public function setListenerId($listenerId){
        $this->listenerId = $listenerId;

        return $this;
    }
}