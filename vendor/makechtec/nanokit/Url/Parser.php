<?php
namespace MakechTec\Nanokit\Url;

class Parser{

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


    public static function removeAroundCurlyBrackets( $str ){
        $newStr = "";

        $newStr = self::removeStartCurlyBracket( $str );
        $newStr = self::removeEndCurlyBracket( $newStr );

        return $newStr;
    }

    public static function removeStartCurlyBracket( $str ){
        if( self::isStartCurlyBracket( $str ) ){
            return substr( $str, 1, strlen( $str ) );
        }
        else{
            return $str;
        }
    }

    public static function isStartCurlyBracket( $str ){
        $slashRegex = "/^\{/";

        return ( preg_match( $slashRegex, $str ) ) ? true : false; 
    }

    public static function removeEndCurlyBracket( $str ){
        if( self::isEndCurlyBracket( $str ) ){
            return substr( $str, 0, strlen( $str ) -1 );
        }
        else{
            return $str;
        }
    }

    public static function isEndCurlyBracket( $str ){
        $endSlashRegex = "/\}$/";
        return ( preg_match( $endSlashRegex, $str ) ) ? true : false;
    }

    public static function divideStr( $str, $divider ){
        $firstPart   = strstr( $str, $divider, true );
        $secondPart     = strstr( $str, $divider );
        $secondPart  = substr( $secondPart, 1, strlen( $secondPart ) );

        return [
            "first"  => $firstPart,
            "second" => $secondPart
        ];
    }

    public static function slugsFromUri( $uri ){
        $result = [];
        
        $uri = self::removeAroundSlashes( $uri );

        while( strpos( $uri, "/" ) ){

            $segments   = self::divideStr( $uri, "/" );
            $slugToSave = $segments['first'];
            $uri       = $segments['second'];
            array_push( $result, $slugToSave );
        }

        array_push( $result, $uri );

        return $result;
    }

}