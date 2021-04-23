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
        Logger::log( "The POST name value is not defined" );
    }

    public function post( Request $request, $user ){
        Logger::log( "This is the POST method message" );
        Logger::log("The name value is: " . $request->getPost()['name']);
        Logger::log("The user value is: " . $user);
    }

    public function test(){
        view( 'welcome' );
    }
}