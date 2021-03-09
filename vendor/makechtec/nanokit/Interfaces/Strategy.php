<?php
namespace MakechTec\Nanokit\Interfaces;

use MakechTec\Nanokit\Core\Site;

interface Strategy{
    public function handleSite( Site $site );
}