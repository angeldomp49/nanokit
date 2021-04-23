<?php
namespace App\Controllers;

use MakechTec\Nanokit\Core\Request;
use MakechTec\Nanokit\Util\Logger;

class WelcomeController{
    public function welcome(){
        view( 'welcome' );
    }
}