<?php
use MakechTec\Nanokit\Routing\Route;
use App\Controllers\HomeController;
use App\Controllers\WelcomeController;

Route::get( '/home/{usuario}/{v}', [ HomeController::class, 'home' ] );
Route::get( '/', [ WelcomeController::class, 'welcome' ] );
Route::get( '/x', [ WelcomeController::class, 'home' ] );