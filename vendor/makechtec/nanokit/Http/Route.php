<?php
namespace MakechTec\Nanokit\Http;

use App\Helpers\H;

class Route{
    public const GET = 0;
    public const POST = 1;

    private static $routes;

    private $uri;
    private $requestType;
    private $classController;
    private $methodController;
    private $namespaceController;
    private $parameters;

    public static function get( $uri, $controller ){
        $route = self::createRoute( self::GET, $uri, $controller );
        self::register( $route );
    }

    public static function post( $uri, $controller ){
        $route = self::createRoute( self::POST, $uri, $controller );
        self::register( $route );
    }

    public static function createRoute( $requestType, $uri, $controller ){
        $route = new Route();
        $route->setRequestType( $requestType );
        $route->setUri( $uri );
        $route->setClassController( $controller[0] );
        $route->setMethodController( $controller[1] );
        return $route;
    }

    public static function register( Route $route ){
        self::$routes[] = $route;
    }

    public static function currentRoute( HttpRequest $request ){
        foreach (self::$routes as $route){
            if( self::matchRequestRoute( $request, $route ) ){
                $route->generateParameters( $request );
                return $route;
            }
        }

        throw new Exception( 'Route not found with uri = ' . $request->geturi() );
    }

    public static function matchRequestRoute( $request, Route $route ){
        $requestUri = H::removeAroundSlashes( $request->getUri() );
        $routeUri = H::removeAroundSlashes( $route->getUri() );

        return ( $requestUri == $routeUri ) ? true : false ;
    }

    public function generateParameters( $request ){
        $this->parameters = [];
    }

    public function UriRegex(){
        //from {n} to (.*)
        $pattern = preg_replace( '\/\{(.*)\}\/', '/(.*)/', $this->getUri() );
        //from /x/ to \/x\/
        $pattern = preg_replace( '\/', '\/', $pattern );
    }
    
    public function getUri(){
        return $this->uri;
    }

    public function setUri($uri){
        $this->uri = $uri;

        return $this;
    }

    public function getRequestType(){
        return $this->requestType;
    }

    public function setRequestType($requestType){
        $this->requestType = $requestType;

        return $this;
    }

    public function getClassController(){
        return $this->classController;
    }

    public function setClassController($classController){
        $this->classController = $classController;

        return $this;
    }

    public function getMethodController(){
        return $this->methodController;
    }

    public function setMethodController($methodController){
        $this->methodController = $methodController;

        return $this;
    }

    public function getNamespaceController(){
        return $this->namespaceController;
    }

    public function setNamespaceController($namespaceController){
        $this->namespaceController = $namespaceController;

        return $this;
    }

    public function getParameters(){
        return $this->parameters;
    }

    public function setParameters($parameters){
        $this->parameters = $parameters;

        return $this;
    }
}