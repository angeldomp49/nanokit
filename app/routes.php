<?php
use MakechTec\Nanokit\Http\Route;
use App\Controllers\HomeController;

Route::get( '/home', [ HomeController::class, 'home' ] );