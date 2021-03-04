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

        $testRoute = new Route();
        $testRoute->setUri( "home/{usuario}/dashboard/{telephono}" );
        $testRoute->generateSlugs();
        $testRoute->generateParamsNames();
        $values = $testRoute->extractParamsValues( "home/123/dashboard/897" );
        
        $testRoute->setParamsValues($values)  ;
        $keys = $testRoute->getParamsNames();
        $values = $testRoute->getParamsValues();
        
        $parameters = array_combine( $keys, $values );

        echo( var_dump( $parameters ) );
    }

    public function getListenerId(){
        return $this->listenerId;
    }

    public function setListenerId($listenerId){
        $this->listenerId = $listenerId;

        return $this;
    }
}