<?php
require_once( '../nanokit/vendor/autoload.php' );
require_once( '../nanokit/vendor/makechtec/nanokit/Util/functions.php' );
require_once( '../nanokit/app/routes.php' );
include_once( '../nanokit/app/dbsettings.php' );
require_once( '../nanokit/vendor/makechtec/nanokit/Core/Kernel.php' );

use makechtec\Nanokit\Core\Kernel;

Kernel::runApplication();