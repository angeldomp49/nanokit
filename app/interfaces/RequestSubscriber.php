<?php
namespace App\Interfaces;

interface RequestSubscriber{
    function doWhenRequestEvent();
}