<?php
require_once( '../vendor/autoload.php' );
require_once( '../vendor/makechtec/nanokit/Util/functions.php' );
require_once( '../app/routes.php' );
include_once( '../app/eloquent/dbsettings.php' );
require_once( '../app/Kernel.php' );

use MakechTec\Nanokit\Url\Parser;
use MakechTec\Nanokit\Util\Logger;

$test = "{this is a test}";
Logger::p( Parser::removeAroundChars( $test, "{", "}" ) );

