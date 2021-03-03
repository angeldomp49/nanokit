<?php
namespace App\Controllers;

class HomeController{
    public function home(){
        view( 'home', [ 'home' => 'hello world' ] );
    }
}