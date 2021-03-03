<?php
namespace MakechTec\PageManager\Router;
use MakechTec\PageManager\Router\Route;

class Url extends Route{
    private $scheme;
    private $user;
    private $password;
    private $host;
    private $port;
    private $path;
    private $query;
    private $fragment;
    private $str;
    private $slugs;

    public function __construct( $str ){

        $data = parse_url( $str );

        $this->str      = $str;
        $this->scheme   = $data['scheme'];
        $this->user     = $data['user'];
        $this->password = $data['password'];
        $this->host     = $data['host'];
        $this->port     = $data['port'];
        $this->path     = $data['path'];
        $this->query    = $data['query'];
        $this->fragment = $data['fragment'];
        $this->slugs    = $this->getUriSlugs( $this->getPath() );
    }

    /**
     * return an array of slugs presents in the uri
     * 
     * @param void
     * @return array   the slugs
     */
    
    public function getUriSlugs( $path ){

        $slugs = [];

        //if starts with /
        if( preg_match( "^\/", $path )){
            $path = substr( $path, 1, strlen( $path ) );
        }  
        //if ends with /
        if( preg_match( "\/$", $path ) ){
            $path = substr( $path, 0, strlen( $path ) - 1 );
        }

        while( strpos( $path, "/" ) ){

            $segments   = $this->divideStr( $path, "/" );
            $slugToSave = $segments['first'];
            $path       = $segments['second'];
            array_push( $slugs, $slugToSave );
        }

        return $slugs;
    }

    /**
     * 
     */

    public function divideStr( $str, $divider ){
        $first   = strstr( $str, $divider, true );
        $aux     = strstr( $str, $divider );
        $second  = substr( $aux, 1, strlen( $aux ) );
        return [
            "first"  => $first,
            "second" => $second
        ];
    }

    public function toString(){
        return $this->str;
    }

    public static function absolute(){
        $httpAndSSL = self::httpAndSSL();
        $domain     = Site::request->getServerName();
        return $httpAndSSL . $domain . '/';
    }

    public static function httpAndSSL(){
        return isset( $_SERVER['HTTPS'] ) ? "https://" : "http://";
    }

    public function toPath(){
        $this->quitTranslation();
        return new Path();
    }

     /**
     * Getter for Scheme
     *
     * @return [type]
     */
    public function getScheme()
    {
        return $this->scheme;
    }

    /**
     * Setter for Scheme
     * @var [type] scheme
     *
     * @return self
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
        return $this;
    }


    /**
     * Getter for User
     *
     * @return [type]
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Setter for User
     * @var [type] user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


    /**
     * Getter for Password
     *
     * @return [type]
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Setter for Password
     * @var [type] password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }


    /**
     * Getter for Host
     *
     * @return [type]
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Setter for Host
     * @var [type] host
     *
     * @return self
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }


    /**
     * Getter for Port
     *
     * @return [type]
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Setter for Port
     * @var [type] port
     *
     * @return self
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }


    /**
     * Getter for Path
     *
     * @return [type]
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Setter for Path
     * @var [type] path
     *
     * @return self
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }


    /**
     * Getter for Query
     *
     * @return [type]
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Setter for Query
     * @var [type] query
     *
     * @return self
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }


    /**
     * Getter for Fragment
     *
     * @return [type]
     */
    public function getFragment()
    {
        return $this->fragment;
    }

    /**
     * Setter for Fragment
     * @var [type] fragment
     *
     * @return self
     */
    public function setFragment($fragment)
    {
        $this->fragment = $fragment;
        return $this;
    }

    /**
     * Getter for Str
     *
     * @return [type]
     */
    public function getStr()
    {
        return $this->str;
    }

    /**
     * Setter for Str
     * @var [type] str
     *
     * @return self
     */
    public function setStr($str)
    {
        $this->str = $str;
        return $this;
    }

    /**
     * Getter for Slugs
     *
     * @return [type]
     */
    public function getSlugs()
    {
        return $this->slugs;
    }

    /**
     * Setter for Slugs
     * @var [type] slugs
     *
     * @return self
     */
    public function setSlugs($slugs)
    {
        $this->slugs = $slugs;
        return $this;
    }

}