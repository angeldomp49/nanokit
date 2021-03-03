<?php
use App\Helpers\H;

function view( $name, $params ){
    extract( $params );
    include( rightPath( 'src/Views/' . $name . '.php' ) );
}



function rightPath( $resource = "" ){
    $resource = $resource;
    $resourceRightSlashes = H::equalSlashes( H::rootPath(), $resource );
    return H::rootPath() . $resourceRightSlashes;
}