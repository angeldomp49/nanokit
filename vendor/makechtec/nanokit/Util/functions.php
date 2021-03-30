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
    Translation::translate( $message );
}