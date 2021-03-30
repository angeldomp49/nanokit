<?php
namespace MakechTec\Nanokit\Core;

use MakechTec\Nanokit\Core\Request;

class Site{
    public $request;
    public $lang;

    public function __construct(){
        $this->request = new Request();
        $this->lang = DEFAULT_LANGUAGE;
    }
}