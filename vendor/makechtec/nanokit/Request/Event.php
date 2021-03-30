<?php
namespace MakechTec\Nanokit\Interfaces;

interface Event{

    function register( $listener );
    function unRegister( $listenerId );
    function notifyEvent();
}
