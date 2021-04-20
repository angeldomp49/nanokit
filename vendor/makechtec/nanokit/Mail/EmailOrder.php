<?php
namespace MakechTec\Nanokit\Mail;

class EmailOrder{

    private $host;
    private $userName;
    private $password;
    private $fromName;
    private $subject;
    private $addresses;
    private $bccs;
    private $ccs;
    private $template;

    public function __construct( Array $config ){        
        $this->host = $config['host'];
        $this->host = $config['userName'];
        $this->host = $config['password'];
        $this->host = $config['fromName'];
        $this->host = $config['subject'];
        $this->host = $config['addresses'];
        $this->host = $config['bccs'];
        $this->host = $config['ccs'];
        $this->host = $config['template'];
    }
    
}