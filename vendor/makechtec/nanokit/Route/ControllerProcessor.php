<?php
namespace MakechTec\Nanokit\Http;

use MakechTec\Nanokit\Route\Route;

class ControllerProcessor{

    public function handleEvent( $request ){
        $currentRoute = Route::currentRoute( $request );
        $classController = $currentRoute->getClassController();
        $methodController = $currentRoute->getMethodController();
        $parameters = $currentRoute->getParameters();

        $instance = new $classController();
        call_user_func_array( [ $instance, $methodController ], $parameters );
    }

    public function getListenerId(){
        return $this->listenerId;
    }

    public function setListenerId($listenerId){
        $this->listenerId = $listenerId;

        return $this;
    }
}