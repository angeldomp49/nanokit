<?php
global $vars;


function putGlobals( $g ){
    global $vars;
    $vars = $g;
}

include('routes.php');
include( 'HomeController.php' );
include( 'ControllerProcessor.php' );

Route::register( '/home', [ HomeController::class, 'home' ] );

$controllerInfo = Route::first();

$processor = new ControllerProcessor();
$processor->run( $controllerInfo[1][0], $controllerInfo[1][1] );

extract( $vars );

include('vista.php');