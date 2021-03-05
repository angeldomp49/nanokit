<?php
use MakechTec\Nanokit\Http\Route;
use App\Controllers\HomeController;
use App\Controllers\WelcomeController;

Route::get( '/home/{usuario}/{v}', [ HomeController::class, 'home' ] );
Route::get( 'welcome', [ WelcomeController::class, 'welcome' ] );