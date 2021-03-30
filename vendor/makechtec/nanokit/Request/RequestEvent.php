<?php 
namespace MakechTec\Nanokit\Request;

use MakechTec\Nanokit\Request\{Event, EventListener};

class RequestEvent implements Event{
    private $listeners;

    public function register( $listener ){
        $this->isListener( $listener );
        $this->listeners[ $listener->getListenerId() ] = $listener;
    }

    public function unRegister( $listenerId ){
        unset( $this->listeners[ $listenerId ] );
    }

    public function notifyEvent(){
        if( empty( $this->listeners ) ){
            return;
        }
        foreach ($this->listeners as $key => $value) {
            $value->handle( $this );
        }
    }

    public function getListeners(){
        return $this->listeners;
    }

    public function setListeners($listeners){
        $this->listeners = $listeners;

        return $this;
    }
}