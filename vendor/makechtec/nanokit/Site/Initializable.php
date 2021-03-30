<?php
namespace MakechTec\Nanokit\Site;

use MakechTec\Nanokit\Site\Site;

interface Initializable{
    public static function init( Site &$site );
}