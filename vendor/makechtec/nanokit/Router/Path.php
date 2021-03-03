<?php
namespace MakechTec\PageManager\Router;
use MakechTec\PageManager\Router\Route;

class Path extends Route{

    public function __construct(  ){
        
    }

    public function toUrl(){
        return new Url();
    }

    public static absolute(){
        
    }

}