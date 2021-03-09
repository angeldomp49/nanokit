<?php
namespace MakechTec\Nanokit\Translations;
use MakechTec\Nanokit\Interfaces\EventListener;
use MakechTec\Nanokit\Interfaces\Strategy;

class Translation implements EventListener, Strategy{
    private $listenerId;
    private $lang;

    public function handleEvent( $request ){
        $slugs = Parser::slugsFromUri( $request->getUri() );
        $lang = $slugs[0];

        setlocale();
        putenv();
    }

    public function handleSite(){
        $uri = $site->virtualRequest->getUri();
        $slugs = Parser::slugsFromUri( $uri );
        $lang = $slugs[0];

        $uriNoLang = Parser::removeSlugOfUri( $uri, $lang );
        Site::$site->virtualRequest->setUri( $uriNoLang );

        Site::$site->locale = $lang;
        $site->updateLocale();
    }

    public function putSiteLocale(){
        $site->setLocale( $this->lang );
        $site->updateLocale();
    }

    public function removeLangOfUriSite( $site ){

    }

    public function getListenerId(){
        return $this->listenerId;
    }

    public function setListenerId($listenerId){
        $this->listenerId = $listenerId;

        return $this;
    }
}