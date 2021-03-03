<?php
namespace App\Helpers;

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

    public static function removeAroundSlashes( $str ){
        $newStr = "";

        $newStr = self::removeStartSlash( $str );
        $newStr = self::removeEndSlash( $newStr );

        return $newStr;
    }

    public static function removeStartSlash( $str ){
        if( self::isStartSlash( $str ) ){
            return substr( $str, 1, strlen( $str ) );
        }
        else{
            return $str;
        }
    }

    public static function isStartSlash( $str ){
        $slashRegex = "/^\//";

        return ( preg_match( $slashRegex, $str ) ) ? true : false; 
    }

    public static function removeEndSlash( $str ){
        if( self::isEndSlash( $str ) ){
            return substr( $str, 0, strlen( $str ) -1 );
        }
        else{
            return $str;
        }
    }

    public static function isEndSlash( $str ){
        $endSlashRegex = "/\/$/";
        return ( preg_match( $endSlashRegex, $str ) ) ? true : false;
    }
}