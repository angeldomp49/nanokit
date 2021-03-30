<?php
namespace MakechTec\Nanokit\Core;

use MakechTec\Nanokit\Core\Request;

class Site{
    public $request;
    private $locale;

    public function __construct(){
        $this->request = new Request();
        $this->locale = null;
    }
}