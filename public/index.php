<?php
require_once( '../nanokit/vendor/autoload.php' );
require_once( '../nanokit/vendor/makechtec/nanokit/Util/functions.php' );
require_once( '../nanokit/app/routes.php' );
include_once( '../nanokit/app/eloquent/dbsettings.php' );
require_once( '../nanokit/app/Kernel.php' );

use App\Kernel;

Kernel::runApplication();