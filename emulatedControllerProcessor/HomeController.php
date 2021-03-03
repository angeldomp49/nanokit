<?php

class HomeController{
    public function home(){
        $vars = [
            'home' => 'hola'
        ];
        echo( "     inside homecontroller" );
        echo( "     vars=  " . $vars['home'] );
        putGlobals( $vars );
    }
}