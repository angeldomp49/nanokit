<?php
namespace MakechTec\Nanokit\Core;

use MakechTec\Nanokit\Core\Site;
use MakechTec\Nanokit\Util\Logger;

class Kernel{

    private static $modules;

    public static function main(){
        $site = new Site();
        $modulesFile = rightPath( 'app/modules.php' );

        self::openModulesFile( $modulesFile );
        self::loadModules( $site );
    }

    public static function openModulesFiles( $modulesFile ){
        if( !file_exists( $modulesFile ) ){
            Logger::err( "Failed loading modules file not exists: " . $modulesFile );
        }
        else{
            $this->modules = include( $modulesFile );
        }
    }

    public static function loadModules( Site &$site ){

        if( empty( $this->modules ) ){
            return;
        }
        
        foreach ($this->modules as $module ) {
            $completeName = 'MakechTec\\Nanokit\\' . $module;
            $initializer = $completeName . '\\' . 'Config::init';

            if( !function_exists( $initializer ) ){
                Logger::err( "Error loading module: " . $initializer . " function not exists." );
            }
            else{
                call_user_func_array( $initializer, [ $site ] );
            }
        }
    }
}