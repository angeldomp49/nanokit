<?php
namespace App;

function view( $name, $params ){
    extract( $params );
    H::includeView( $name );
}



function rightPath( $resource = "" ){

    H::removeStartSlash( $resource );
    return H::rootPath() . $resource;
}



class H{

    public static function includeView( $name ){
        include( rightPath( 'src/Views/' . $name . '.php' ) );
    }

    public static function rootPath(){
        $fromDiskDir    = __DIR__;
        $fromRootDir  = 'app/' . __NAMESPACE__;
    
        return str_replace( self::equalSlashes( $fromRootDir, $fromDiskDir), "", $fromDiskDir  );
    }

    public static function equalSlashes( $str1 = "", $str2 = "" ){
        if( preg_match( "/\//", $str1 ) ){
            return preg_replace( "/\\\\/", "/", $str2 );
        }
        else if ( preg_match( "/\\\\/", $str1 ) ){
            return preg_replace( "/\//", "\\", $str2 );
        }
    }

    public static function removeStartSlash( $str ){
        if( self::startSlash( $str ) ){
            return substr( $str, 1, strlen( $str ) );
        }
        else{
            return $str;
        }
    }

    public static function startSlash( $str ){
        $slashRegex = "/^\//";

        return ( preg_match( $slashRegex, $str ) ) ? true : false; 
    }
}