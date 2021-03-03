<?php

class Uri{
    private $slugs;
    private $uri;

    public function toString(){
        return $this->$uri;
    }

    public function removeAroundSlashes(){
        $this->removeFirstSlash();
        $this->removeLastSlash();
    }
    public function removeFirstChar(){
        $this->uri = substr( $this->uri, 1, strlen( $this->uri ) );
    }
    public function removeLastChar(){
        $this->uri = substr( $this->uri, 0, strlen( $this->uri ) - 1 );
    }
    public function removeFirstSlash(){
        $startSlashRegex = "^\/";
        if( preg_match( $startSlashRegex, $this->uri )){
            $this->removeFirstChar();
        }  
    }
    public function removeLastSlash(){
        $lastSlashRegex = "\/$";
        if( preg_match( $finalSlashRegex, $this->uri ) ){
            $this->removeLastChar();
        }
    }
}