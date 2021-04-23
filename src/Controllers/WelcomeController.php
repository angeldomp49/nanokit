<?php
namespace App\Controllers;

use MakechTec\Nanokit\Core\Request;
use MakechTec\Nanokit\Util\Logger;

class WelcomeController{
    public function welcome(){
        $request = new Request();
        Logger::logDump( $request->getMethod() );
    }


    public function get(){
        Logger::log( "This is the GET method message" );
    }

    public function post(){
        Logger::log( "This is the POST method message" );
    }

    public function test(){
        view( 'welcome' );
    }
}