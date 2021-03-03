<?php
namespace App\Helpers;

class H{


    public static function rootPath(){
        $fromDiskDir    = __DIR__;
        $fromRootDir  = 'app';

        $fromDiskDirEqSlashes = self::equalSlashes( $fromDiskDir, $fromRootDir);
    
        return str_replace( $fromRootDir, "", $fromDiskDir  );
    }

    public static function equalSlashes( $reference = "", $target = "" ){
        $slashRegex = "/\//";
        $slash = "/";

        $antiSlashRegex = "/\\\\/";
        $antiSlash = "\\";

        if( preg_match( $slashRegex, $reference ) ){
            return preg_replace( $antiSlashRegex, $slash, $target );
        }
        else if ( preg_match( $antiSlashRegex, $reference ) ){
            return preg_replace( $slashRegex, $antiSlash, $target );
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