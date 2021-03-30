<?php
require_once( '../vendor/autoload.php' );
require_once( '../vendor/makechtec/nanokit/Util/functions.php' );
require_once( '../app/routes.php' );
include_once( '../app/dbsettings.php' );
include_once( '../app/generalsettings.php' );

use MakechTec\Nanokit\Core\Kernel;

Kernel::main();


