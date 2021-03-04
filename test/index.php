<?php
require_once( '../nanokit/app/Kernel.php' );
require_once( '../nanokit/vendor/autoload.php' );
require_once( '../nanokit/app/helpers.php' );
require_once( '../nanokit/app/functions.php' );
require_once( '../nanokit/app/routes.php' );

use Tests\{ Test, Request as RequestTest};
$test = new Test();
$requestTest = new RequestTest();

$test->addTest( $requestTest );

$test->runTests();