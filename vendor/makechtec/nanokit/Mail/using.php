<?php

$structure = [
    'host' => "mail.pixelsiete.com",
    'userName' => 'wordpress@pixelsiete.com',
    'password' => 'example',
    'fromName' => 'Emitter',
    'subject' => 'Contact Form'
];

$sender = new Sender( new Order( $structure ) );
$sender->send();