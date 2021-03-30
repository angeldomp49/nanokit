<?php
namespace MakechTec\Nanokit\Core;

use MakechTec\Nanokit\Core\Site;
use MakechTec\Nanokit\Util\Logger;

class Kernel{

    public static $modules;

    public static function main(){
        $site = new Site();
        $modulesFile = rightPath( 'app/modules.php' );

        self::openModulesFile( $modulesFile );
        self::loadModules( $site );
    }

    public static function openModulesFile( $modulesFile ){
        if( !file_exists( $modulesFile ) ){
            Logger::err( "Failed loading modules file not exists: " . $modulesFile );
        }
        else{
            self::$modules = include( $modulesFile );
        }
    }

    public static function loadModules( Site &$site ){

        if( empty( self::$modules ) ){
            return;
        }
        
        foreach (self::$modules as $module ) {
            $completeName = 'MakechTec\\Nanokit\\' . $module;
            $initializer = $completeName . '\\' . 'Config';
            $method = "init";

            if( !method_exists( $initializer, $method ) ){
                Logger::err( "Error loading module: " . $initializer. "::". $method . " function not exists." );
            }
            else{
                $initializer::$method( $site );
            }
        }
    }
}