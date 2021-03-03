<?php

interface Testable{
    function getTestId();
    function setTestId();

    function run();
}