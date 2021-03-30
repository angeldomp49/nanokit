<?php
namespace MakechTec\Nanokit\Translations;

class Translation{
    public static $lang;

    public static function translate( $message ){
        $currentLang = self::$lang;
        $langFileName = "lang/" . $currentLang . ".php";
        $langFileName = rightPath( $langFileName );
    
        $stringsArray = self::arrayFromJsonFile( $langFileName );

        if( empty( $stringsArray ) ){
            echo( $message );
        }
        else{
            self::translatedString( $message, $stringsArray );
        }
    }

    public static function arrayFromJsonFile( $fileName ){
        if( !file_exists( $fileName ) ){
            Logger::err( "Language file not found for: " . $fileName );
            return [];
        }
        else{
            $langFile = new SplFileObject( $fileName );
            $langFileContent = $langFile->fread( $langFile->getSize() );
            $langArr = json_decode( $langFileContent ); 
            return $langArr;
        }
    }

    public static function translatedString( $message, $stringsArray ){
        foreach ($stringsArrat as $key => $value) {
            if( strcmp( $message, $key ) ){
                echo( $value );
                return;
            }
        }

        echo( $message );
    }
}