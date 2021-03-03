<?php

class Test{

    private $tests;

    public function addTest( $test ){
        $this->tests[$test->getTestId] = $test;
    }

    public function removeTest( $testId ){
        unset( $this->tests[ $testId ] );
    }

    public function runTests(){
        if( emtpy( $this->test ) ){
            return;
        }
        foreach( $this->tests as $test ){
            $test->run();
        }
    }
}