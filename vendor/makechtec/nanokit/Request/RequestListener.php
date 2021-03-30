<?php
namespace MakechTec\Nanokit\Request;

use MakechTec\Nanokit\Request\Request;

interface RequestListener{
    function handle( Request $request);
}