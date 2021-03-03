<?php
require_once( '../app/Kernel.php' );

use Tests\{ Test, Request as RequestTest};
$test = new Test();
$requestTest = new RequestTest();

$test->addTest( $requestTest );

$test->runTests();