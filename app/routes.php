<?php
use MakechTec\Nanokit\Routing\Route;

use App\Controllers\WelcomeController;

Route::get( '/', [ WelcomeController::class, 'welcome' ] );