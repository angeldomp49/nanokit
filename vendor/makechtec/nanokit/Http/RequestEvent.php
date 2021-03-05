<?php 
namespace MakechTec\Nanokit\Http;

use MakechTec\Nanokit\Interfaces\{Event, EventListener};

class RequestEvent implements Event{
    private $listeners;
    private $request;

    public function launch(){
        $this->request = new HttpRequest();
        $this->notifyEvent();
    }

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
            $value->handleEvent( $this->request );
        }
    }

    public function isListener( $listener ){
        if(! $listener instanceof EventListener ){
            throw new \Exception( 'must implements EventListener' );
        }
    }

    public function getListeners(){
        return $this->listeners;
    }

    public function setListeners($listeners){
        $this->listeners = $listeners;

        return $this;
    }

    public function getRequest(){
        return $this->request;
    }

    public function setRequest($request){
        $this->request = $request;

        return $this;
    }
}