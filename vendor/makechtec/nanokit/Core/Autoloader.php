<?php 
namespace MakechTec\PageManager\Core;

class Autoloader{
    public static $libLocation = "vendor/";

    /**
     * try to load the requested class when php not found it, then include the right file
     * the prefix describe the directory when the MakechTec is stored from the base path
     * 
     * @param         string           $className    class name with namespace
     * @return        void
     */
    
    public static function loadClass( $className ){
        $fileClassPath                = self::$libLocation . $className;
        $fileClassPathNoAntiSlashes   = preg_replace( "/\\\\/", "/", $fileClassPath );
        $fileClassPathWithTermination = $fileClassPathNoAntiSlashes . ".php";
        
        $absoluteFileClassPath = self::rightPath( $fileClassPathWithTermination, false );

        if( file_exists( $absoluteFileClassPath ) ){
            include( $absoluteFileClassPath );
        }
        else{
            echo( "File not found: " . $absoluteFileClassPath );
        }

    }

    /**
     * gets the root absolute path on hard disk of the project
     * 
     * @return    string        absolute path in hard disk
     */
    public static function getRootPath(){
        $fromDiskDir    = __DIR__;
        $fromRootDir  = self::$libLocation . __NAMESPACE__;

        return str_replace( equalSlashes( $fromRootDir, $fromDiskDir), "", $fromDiskDir  );
    }

    /**
     * path (on hard disk) to the request file
     * 
     * @param       string       $pathToResource       resource
     * @param       boolean      $show                 if echo or return
     * @return      string       absolute path on hard disk
     */

    public static function absolutePath( $pathToResource = "", $show = true ){

        if( preg_match( "/^\//", $pathToResource) ){
            $pathToResource = substr( $pathToResource, 1, strlen( $pathToResource ) );
        }

        if( $show ){
            echo(self::getRootPath() . $pathToResource);
        }
        else{
            return self::getRootPath() . $pathToResource;
        }
    }

    /**
     * Depending the $str2 slashes or antislashes the $str1 will be equal in it
     * example: 
     * $str1 = "foo/bar", $str2 = "foo2\bar"    returns "foo\bar"
     * 
     * @param     string    $str1          string to be changed
     * @param     string    $str2          string reference
     * @return    string    str1 modified
     */

    public static function equalSlashes( $str1 = "", $str2 = "" ){
        if( preg_match( "/\//", $str1 ) ){
            return preg_replace( "/\\\\/", "/", $str2 );
        }
        else if ( preg_match( "/\\\\/", $str1 ) ){
            return preg_replace( "/\//", "\\", $str2 );
        }
    }
}

spl_autoload_register( __NAMESPACE__."\Autoloader::loadClass" );