<?php
use MakechTec\Nanokit\Http\Route;

Route::get( '/nanokit/test', [ HomeController::class, 'home' ] );