<?php
use MakechTec\Nanokit\Routing\Route;
use App\Controllers\HomeController;
use App\Controllers\WelcomeController;

Route::get( '/welcome', [ WelcomeController::class, 'test' ] );
Route::get( '/', [ WelcomeController::class, 'welcome' ] );

Route::get( '/method', [ WelcomeController::class, 'get' ] );
Route::post( '/method/{user}', [ WelcomeController::class, 'post' ] );