<?php

class Routing implements Testable{

    public $testId;



    public function run(){

    }

    public function getTestId(){
        return $this->testId;
    }

    public function setTestId($testId){
        $this->testId = $testId;

        return $this;
    }
}