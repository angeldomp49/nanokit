<?php
namespace MakechTec\Nanokit\Http;

class ControllerProcessor{
    public function runControllerFromRoute( Route $route ){
        $classController = $route->getClassController();
        $methodController = $route->getMethodController();

        $instance = new $classController();
        $instance->$methodController();
    }
}