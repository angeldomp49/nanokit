<?php

$templateData = [
    'name' => 'Foo',
    'email' => 'bar'
];

$structure = [
    'host' => "mail.pixelsiete.com",
    'userName' => 'wordpress@pixelsiete.com',
    'password' => 'example',
    'fromName' => 'Emitter',
    'subject' => 'Contact Form',
    'addresses' => [
        'wordpress@pixelsiete.com'
    ],
    'bccs' => [

    ],
    'ccs' => [

    ],
    'template' => new Template('mail.php', $templateData )
];

$sender = new Sender( new Order( $structure ) );
$sender->send();