<?php
namespace MakechTec\PageManager\Translation;

class Translation{
    private $location;
    private $lang;
    private $domain;
    private $domain_url;
    private $full_name;



    public function __construct( $location, $lang, $domain, $domain_url ){
        $this->location   = $location ;
        $this->lang       = $lang ;
        $this->domain     = $domain ;
        $this->domain_url = $domain_url ;
    }

    public static function getFromUrl( Url $url ){
        foreach( self::$translations as $translation ){
            if( preg_match( $translation->getRegEx(), $url->getUri()->toString() ) ){
                return $translation;
            }
        }

        return null;
    }

    
    if( empty( self::$translations ) ){
        return "";
    }

    foreach( self::$translations as $trans ){
        $trans_to_search = "/\/".$trans."\//";

        if( preg_match( $trans_to_search, $uri ) ){
            return $trans;
        }
    }
    
    return "";
    
    /**
     * Getter for Location
     *
     * @return [type]
     */
    public function getLocation(){
        return $this->location;
    }

    /**
     * Setter for Location
     * @var [type] location
     *
     * @return self
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }


    /**
     * Getter for Lang
     *
     * @return [type]
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Setter for Lang
     * @var [type] lang
     *
     * @return self
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }


    /**
     * Getter for Domain
     *
     * @return [type]
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Setter for Domain
     * @var [type] domain
     *
     * @return self
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }


    /**
     * Getter for Domain_url
     *
     * @return [type]
     */
    public function getDomain_url()
    {
        return $this->domain_url;
    }

    /**
     * Setter for Domain_url
     * @var [type] domain_url
     *
     * @return self
     */
    public function setDomain_url($domain_url)
    {
        $this->domain_url = $domain_url;
        return $this;
    }


    /**
     * Getter for Full_name
     *
     * @return [type]
     */
    public function getFull_name()
    {
        return $this->full_name;
    }

    /**
     * Setter for Full_name
     * @var [type] full_name
     *
     * @return self
     */
    public function setFull_name($full_name)
    {
        $this->full_name = $full_name;
        return $this;
    }


}