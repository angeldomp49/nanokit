<?php
namespace App\Controllers;

class WelcomeController{
    public function welcome(){
        view( 'welcome', [ 
            'content' => 'Welcome to Nanokit'
         ] );
    }
}