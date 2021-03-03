<?php 
namespace MakechTec\PageManager;

class Site{
    
    public static $name          = "MakechTecnology";
    public static $description   = "Tecnology everywhere";
    public static $url           = "makechtecnology.com";
    public static $logo;
    public static $favicon;
    public static $email;
    public static $phone;
    public static $address;
    public static $globalranslation;
    public static $libLocation = "vendor/";

    public static const TRANSLATION_DOMAIN = "PageManager"; 
 
    public static function RootPath(){
        $fromDiskDir    = __DIR__;
        $fromRootDir  = self::$libLocation . __NAMESPACE__;

        return str_replace( equalSlashes( $fromRootDir, $fromDiskDir), "", $fromDiskDir  );
    }

    public static function absolutePath( $resource = "", $show = true ){

        self::removeStartSlash( $resource );
        self::printOrReturn( self::RootPath() . $resource, $show );

    }

    public static function equalSlashes( $str1 = "", $str2 = "" ){
        if( preg_match( "/\//", $str1 ) ){
            return preg_replace( "/\\\\/", "/", $str2 );
        }
        else if ( preg_match( "/\\\\/", $str1 ) ){
            return preg_replace( "/\//", "\\", $str2 );
        }
    }

    public static function toArray(){
        return [
            'siteName'            => self::$name,
            'SiteDescription'     => self::$description,
            'siteUrl'             => self::right_url(),
            'currentTranslation'  => self::$currentTranslation
        ];
    }

    public static function loadData( $data ){
        self::$name         = $data['name'];
        self::$description  = $data['description'];
        self::$url          = $data['url'];
        self::$logo         = $data['logo'];
        self::$favicon      = $data['favicon'];
        self::$email        = $data['email'];
        self::$phone        = $data['phone'];
        self::$address      = $data['address'];
    }

    public static function init(){
        self::$request = new HttpRequest();

        self::putGlobalTranslation();
        self::openView();
    }

    public static function putGlobalTranslation(){
        Site::setGlobalTranslation( Translation::getFromUrl( self::$request->getUrl() ) );
    }

    public static function setGlobalTranslation( Translation $urlTranslation ){
        textdomain( self::TRANSLATION_DOMAIN );
        putenv( "LC_ALL=" . $urlTranslation->getISOName() );
        setLocale( LC_ALL, $urlTranslation->getISOName() );
    }

    public static function openView(){
        $resource = self::$request->getUrl();
        $resource->changeSlug( "public", "views" );
        Route::openFile( $resource->toPath() );
    }

    public static printOrReturn( $var, $print = true ){
        if( $print ){
            echo( $var );
        }
        else{
            return $var;
        }
    }

    public static function startSlash( $str ){
        $slashRegex = "/^\//";

        return ( preg_match( $slashRegex, $str ) ) ? true : false; 
    }

    public static function removeStartSlash( $str ){
        if( self::startSlash( $str ) ){
            return substr( $str, 1, strlen( $str ) );
        }
        else{
            return $str;
        }
    }

}
