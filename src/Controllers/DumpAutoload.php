<?php
namespace App\Controllers;

class DumpAutoload{
    public function run(){
        exec("php composer.phar dump-autoload");
    }
}