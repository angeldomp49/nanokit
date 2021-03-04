<?php
namespace MakechTec\Nanokit\Interfaces;

interface EventRegister{

    function launch();
    function register( $listener );
    function unRegister( $listenerId );
    function notifyEvent();
    function isListener( $listener );
}
