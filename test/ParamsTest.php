<?php
namespace Tests;
use MakechTec\Nanokit\Interfaces\EventListener;

class ParamsTest implements EventListener{
    private $listenerId;

    public function handleEvent( $request ){
        
    }

    public function getListenerId(){
        return $this->listenerId;
    }

    public function setListenerId($listenerId){
        $this->listenerId = $listenerId;

        return $this;
    }
}