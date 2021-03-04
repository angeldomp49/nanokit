<?php
namespace Tests;
use MakechTec\Nanokit\Interfaces\EventListener;
use MakechTec\Nanokit\Http\Route;
use App\Helpers\H;

class ParamsTest implements EventListener{
    private $listenerId;

    public function handleEvent( $request ){
        $currentRoute = Route::currentRoute( $request );
        //$currentRoute->generateParameters( $request );
        //echo( var_dump( $currentRoute->getParameters() ) );
        //$paramsNames = $currentRoute->extractParamsNames( "/home/{usuario}/dashboard/{telephono}" );

        $toTest = "home/{usuario}/dashboard/{telephono}";
        $result = null;
        
        $result = $currentRoute->extractParamsNames( $toTest );

        echo( var_dump( $result ) );
    }

    public function getListenerId(){
        return $this->listenerId;
    }

    public function setListenerId($listenerId){
        $this->listenerId = $listenerId;

        return $this;
    }
}