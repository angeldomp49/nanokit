<?php 
namespace MakechTec\PageManager\Router;

class Route{
    private $uri;
    private $class;
    private $fn;
    private $slugs;

    public function __construct( $uri, $procedure ){
        $this->uri   = $uri;
        $this->class = $procedure[0];
        $this->fn    = $procedure[1];
        $this->slugs = $this->getUriSlugs( $this->$uri );
    }

    public function getUriSlugs(){

        $slugs = [];

        

        while( strpos( $path, "/" ) ){

            $segments   = $this->divideStr( $path, "/" );
            $slugToSave = $segments['first'];
            $path       = $segments['second'];
            array_push( $slugs, $slugToSave );
        }

        return $slugs;
    }




    public static function openFile( Path $path ){
        include( $path->toString() );
    }
    

}