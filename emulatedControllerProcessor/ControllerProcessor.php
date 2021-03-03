<?php

class ControllerProcessor{
    public function run( $className, $func ){
        $instance = new $className();
        $instance->$func();
    }

    
}