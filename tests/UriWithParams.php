<?php
namespace Tests;

use MakechTec\Nanokit\Http\Route;
use MakechTec\Nanokit\Interfaces\EventListener;

class UriWithParams implements EventListener{
    private $listenerId;

    public function handleEvent1( $request ){
        $patt = '/\{(.*?)\}/';
        $subject = 'home/{usuario}/dashboard/{telefono}';
        $result = preg_replace( $patt,'(.*)', $subject );
        $result = preg_replace( '/\//', '\/', $result );

        $newRegex = '/' . $result . '/';
        $attempt = preg_match( $newRegex, 'home/123/dashboard/896' );

        echo( var_dump( $attempt ) );
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