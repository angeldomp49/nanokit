<?php
namespace MakechTec\PageManager\Translation;

class TranslationManager{

    public static $currentTranslation ;
    public static $translations       ;
    public static $defaultTranslation ;

    public static function getSlug( $uri ){

        if( empty( self::$translations ) ){
            return "";
        }

        foreach( self::$translations as $trans ){
            $trans_to_search = "/\/".$trans."\//";

            if( preg_match( $trans_to_search, $uri ) ){
                return $trans;
            }
        }
        
        return "";
    }

    public static function switchLang( $uri, $domain ){
        $current = self::getSlug( $uri );

        bindtextdomain( $domain, "languages" );
        textdomain( $domain );
        putenv("LC_ALL=" . $current);
        setlocale(LC_ALL, $current);
    }

    public static function uriNoLang( $uri ){
        $current = self::getSlug( $uri );
        return preg_replace( "/\/".$current."/", "", $uri );
    }

    /**
     * match is the uri has a requested translation with format /es_MX/
     * 
     * @param          string                   $uri          requested uri
     * @return         boolean                  if there is requested translation   
     */

    function thereIsUriTrans( $uri ){
        return preg_match( "/\/[a-z]{2}\_[A-Z]{2}\//", $uri );
    }
}