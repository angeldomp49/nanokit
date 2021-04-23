<?php
namespace App\Controllers;

use MakechTec\Nanokit\Mail\{ EmailOrder, Sender };

class MailController{
    public function write(){
        view( 'new-mail' );
    }

    public function send(){
        

        $order = new EmailOrder();
    }
}