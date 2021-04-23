<?php
namespace MakechTec\Nanokit\Routing;

use MakechTec\Nanokit\Routing\Route;
use MakechTec\Nanokit\Core\Site;
use MakechTec\Nanokit\Core\Interfaces\Initializable;
use MakechTec\Nanokit\Util\Logger;

class Config implements Initializable{

    public static function init( Site &$site ){
        addSettingsFile( "routes.php" );

        $mandatoryParameters['request'] = $site->getRequest();

        $currentRoute = Route::currentRoute( $site->request );

        $classController = $currentRoute->getClassController();

        $methodController = $currentRoute->getMethodController();
        $additionalparameters = $currentRoute->getParameters();

        $parameters = array_merge( $mandatoryParameters, $additionalparameters );

        $instance = new $classController();
        call_user_func_array( [ $instance, $methodController ], $parameters );
    }
}