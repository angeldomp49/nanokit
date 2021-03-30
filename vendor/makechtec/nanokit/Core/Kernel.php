<?php
namespace MakechTec\Nanokit\Core;

use MakechTec\Nanokit\Site\Site;
use MakechTec\Nanokit\Util\Logger;

class Kernel{

    public static function main(){
        $site = new Site();
        $modulesFile = rightPath( 'app/modules.php' );

        if( !file_exists( $modulesFile ) ){
            Logger::err( "Failed loading modules file not exists: " . $modulesFile );
        }
        else{
            $modules = include( $modulesFile );
            self::loadModules( $site, $modules );
        }

    }

    public static function loadModules( Site &$site, $modules ){

        if( empty( $modules ) ){
            return;
        }
        
        foreach ($modules as $module ) {
            $completeName = 'MakechTec\\Nanokit\\' . $module;
            $initializer = $completeName . '\\' . 'Config::init';

            if( !function_exists( $initializer ) ){
                Logger::err( "Error loading module: " . $initializer . " function not exists." );
            }

            call_user_func_array( $initializer, [ $site ] );
        }
    }
}