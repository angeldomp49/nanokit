<?php
namespace MakechTec\Nanokit\Site;

use MakechTec\Nanokit\Request\Request;

class Site{
    public $request;
    private $locale;

    public function __construct(){
        $this->request = new Request();
    }
}