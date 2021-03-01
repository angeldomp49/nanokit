<?php

include_once( 'dbsettings.php' );

use Illuminate\Database\Capsule\Manager as DB;

$DB = new DB();

$DB->addConnection([
    "driver" => DBDRIVER,
    "host" => DBHOST,
    "database" => DBNAME,
    "username" => DBUSER,
    "password" => DBPASSWORD
]);

$DB->setAsGlobal();
$DB->bootEloquent();