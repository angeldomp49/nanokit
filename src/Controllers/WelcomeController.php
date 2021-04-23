<?php
namespace App\Controllers;

class WelcomeController{
    public function welcome(){
        view( 'welcome', [
            'say' => 'Hello World',
        ]);
    }
}