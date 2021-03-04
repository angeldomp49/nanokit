<?php
namespace App\Interfaces\RequestPublisher;

interface RequestPublisher{
    function subscribeToRequestEvent();
    function unSubscribeToRequestEvent();
    function RequestEventLaunched();
}