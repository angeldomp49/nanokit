<?php
use MakechTec\Nanokit\Http\Route;

Route::get( '/home', [ HomeController::class, 'home' ] );