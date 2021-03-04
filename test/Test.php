<?php
namespace Tests;
use Tests\Testable;

class Test{

    private $tests;

    public function addTest( $test ){
        if(! $test instanceof Testable ){
            throw new Exception( 'must implements Testable' );
        }
        $this->tests[$test->getTestId()] = $test;
        echo( var_dump( $test ) );
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