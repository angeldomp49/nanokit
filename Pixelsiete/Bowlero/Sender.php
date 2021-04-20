<?php
namespace Pixelsiete\Bowlero;

include_once("Logger.php");

use PHPMailer\PHPMailer\PHPMailer;
use MakechTec\Nanokit\Util\Logger;

class Sender{
    private $defaultMailer;

    public function __construct(){

        $this->defaultMailer = new PHPMailer();
        $this->defaultMailer->isSMTP();
        $this->defaultMailer->SMTPAuth = true;
        $this->defaultMailer->SMTPSecure = "ssl";
        $this->defaultMailer->Port = 465;
        $this->defaultMailer->WordWrap = 50;
        $this->defaultMailer->isHTML(true);
        $this->defaultMailer->CharSet = 'UTF-8';
    }

    public function enviarEmail( $solicitud ){

        $this->configurarEmail( $solicitud );
        if( !$this->defaultMailer->send() ){	
            throw new Exception("Error enviando el mail de respuesta", 1);
        }
    }

    public function configurarEmail( $solicitud ){
        try {
            $this->defaultMailer->Host = $solicitud->emailConfig['host'];
            $this->defaultMailer->Username = $solicitud->emailConfig['userName'];
            $this->defaultMailer->Password = $solicitud->emailConfig['password'];
            $this->defaultMailer->setFrom($solicitud->emailConfig['userName'], $solicitud->emailConfig['fromName'] );
            $this->defaultMailer->Subject = $solicitud->emailConfig['asuntoDelMail'];
            $this->defaultMailer->Body = $this->emailTemplate( $solicitud->emailConfig['emailTemplate'], $solicitud->emailConfig['data'] );

            if(!BOWLERO_DEBUG){
                $this->defaultMailer->AddAddress( $solicitud->post['email'] );
                foreach ($solicitud->emailConfig['receptores'] as $address) {
                    $this->defaultMailer->AddAddress( $address );
                }
            
                foreach ($solicitud->emailConfig['copiasOcultas'] as $copia ) {
                    $this->defaultMailer->AddBCC( $copia );
                }
            }
            else{
                $this->defaultMailer->AddAddress("wordpress@pixelsiete.com");
            }
        } catch (Exception $e) {
            throw new Exception("Error configurando el mail: " . $sender->ErrorInfo, 1);
        }
    }

    public function emailTemplate( $templatePath, $params ){
        global $data;
        
        $data = $params;
        $templateString = "";
        ob_start();
        include( $templatePath );
        $templateString = ob_get_contents();
        ob_end_clean();

        return $templateString;
    }
}