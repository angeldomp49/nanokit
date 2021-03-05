<?php
namespace MakechTec\Nanokit\Translations;
use MakechTec\Nanokit\Interfaces\EventListener;

class Translation implements EventListener{
    private $listenerId;

    public function handleEvent( $request ){
        $slugs = Parser::slugsFromUri( $request->getUri() );
        $lang = $slugs[0];

        setlocale();
        putenv();
    }

    public function getListenerId(){
        return $this->listenerId;
    }

    public function setListenerId($listenerId){
        $this->listenerId = $listenerId;

        return $this;
    }
}