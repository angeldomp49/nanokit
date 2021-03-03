<?php
namespace Tests;

class Test{

    private $tests;

    public function addTest( $test ){
        $this->tests[$test->getTestId()] = $test;
    }

    public function removeTest( $testId ){
        unset( $this->tests[ $testId ] );
    }

    public function runTests(){
        if( empty( $this->tests ) ){
            return;
        }
        foreach( $this->tests as $test ){
            $test->run();
        }
    }
}