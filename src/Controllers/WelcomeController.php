<?php
namespace App\Controllers;

class WelcomeController{
    public function welcome(){
        view( 'welcome', [ 
            'content' => 'Welcome to Nanokit'
         ] );
    }
    public function home(){
        view( 'welcome', [ 
            'content' => 'fasddsfsfa'
         ] );
    }
}