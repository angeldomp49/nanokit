<?php
use MakechTec\Nanokit\Url\Parser;
use MakechTec\Nanokit\Util\Logger;
use MakechTec\Nanokit\Translation\Translation;

function view( $name, $params ){
    extract( $params );
    include( rightPath( 'src/Views/' . $name . '.php' ) );
}

function rightPath( $resource = "" ){
    $resourceRightSlashes = Parser::equalSlashes( Parser::rootPath(), $resource );
    return Parser::rootPath() . $resourceRightSlashes;
}

function _t( $message ){
    $currentLang = Translation::$lang;
    $langFile = "lang/" . $currentLang . ".php";
    $langFile = rightPath( $langFile );

    if( !file_exists( $langFile ) ){
        Logger::err( "Language file not found for: " . $currentLang );
        echo( $message );
    }
    else{
        $f 
    }
}