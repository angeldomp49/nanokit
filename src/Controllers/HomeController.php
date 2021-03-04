<?php
namespace App\Controllers;

class HomeController{
    public function home( $usuario ){
        view( 'home', [ 'home' => 'hello world', 'usuario' => $usuario ] );
    }
}