<?php
require_once( '../vendor/autoload.php' );
require_once( '../vendor/makechtec/nanokit/Util/functions.php' );
require_once( '../app/routes.php' );
include_once( '../app/eloquent/dbsettings.php' );
require_once( '../app/Kernel.php' );

use App\Kernel;

Kernel::runApplication();
