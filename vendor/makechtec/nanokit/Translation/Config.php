<?php
namespace MakechTec\Nanokit\Translations;

use MakechTec\Nanokit\Core\Site;
use MakechTec\Nanokit\Core\Interfaces\Initializable;

class Config implements Initializable{

    public static function init( Site &$site ){
        $slugs = Parser::slugsFromUri( $site->request->getUri() );
        $lang = $slugs[0];
        $site->lang = $lang;
        Translation::$lang = $lang;

        unset( $slugs[0] );
        $newUri = Parser::uriFromSlugs( $slugs );
        $site->request->setUri( $newUri );
    }
}