<?php
use MakechTec\Nanokit\Routing\Route;
use App\Controllers\HomeController;
use App\Controllers\WelcomeController;
use App\Controllers\DumpAutoload;
use App\Controllers\OtherController;

Route::get( '/welcome', [ WelcomeController::class, 'test' ] );
Route::get( '/', [ WelcomeController::class, 'welcome' ] );

Route::get( '/method', [ WelcomeController::class, 'get' ] );
Route::post( '/method/{user}', [ WelcomeController::class, 'post' ] );

Route::get('dump-autoload', [ DumpAutoload::class, 'run' ]);
Route::get( 'other', [ OtherController::class, 'test' ] );