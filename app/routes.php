<?php
use MakechTec\Nanokit\Routing\Route;
use App\Controllers\WelcomeController;
use App\Controllers\DumpAutoload;

Route::get( '/', [ WelcomeController::class, 'welcome' ] );
Route::get('dump-autoload', [ DumpAutoload::class, 'run' ]);

Route::get( '/new-mail', [ MailController::class, 'write' ] );
Route::post( '/mail', [ MailController::class, 'send' ] );