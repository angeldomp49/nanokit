<?php
namespace Pixelsiete\Bowlero;

require_once("ReCaptcha/ReCaptcha.php");
require_once("PHPMailer/src/PHPMailer.php");
require_once("PHPMailer/src/Exception.php");
require_once("PHPMailer/src/SMTP.php");
require_once("Store.php"); 
require_once("Solicitud.php");
require_once("Sender.php");
require_once("Util.php");
require_once("Logger.php");

use ReCaptcha\ReCaptcha;
use PHPMailer\PHPMailer\PHPMailer;
use Pixelsiete\Bowlero\{Store, Solicitud, Sender, Util};
use \Exception;
use MakechTec\Nanokit\Util\Logger;

class Procesador{

    const RECAPTCHA_KEY = "6Lfp94kUAAAAAG23aAY5xC7X5n4enFuXLbUgXq0d";

    public static function main( $solicitudesArr, $datos ){
        try{
            $solicitud = self::crearSolicitud( $solicitudesArr, $datos);
            self::procesarSolicitud( $solicitud );
            self::exito();
        }
        catch( Exception $e ){
            self::fallo( $e );
        }
    }

    public static function crearSolicitud( $solicitudesArr, $datos ){
        foreach ($solicitudesArr as $key => $value) {
            if( $key == $datos['token'] ){
                return new Solicitud( 
                    $datos, 
                    $value['valores'],
                    $value['tabla'],
                    $value['emailConfig'] 
                    );
            }
        }
        throw new Exception("Formulario no encontrado", 1);
        
    }

    public static function procesarSolicitud( Solicitud $solicitud ){
        
        $store = new Store();
        $sender = new Sender();
        if(!BOWLERO_DEBUG){
            self::reCaptchaComprobacion( $solicitud );
        }
        
        $store->insertarDatos( $solicitud->tabla, $solicitud->valores );

        $sender->enviarEmail( $solicitud );
    }

    public static function reCaptchaComprobacion( $solicitud ){
        
        $respuesta = null;
        $ipCliente = $_SERVER['REMOTE_ADDR'];
        $reCaptchaInstance = new ReCaptcha( self::RECAPTCHA_KEY );

        $respuesta = $reCaptchaInstance->verifyResponse( $ipCliente, $solicitud->post["g-recaptcha-response"] );
        if( $solicitud->post['g-recaptcha-response'] && $respuesta != null ){
            return $respuesta;
        }
        else{
            throw new Exception("Error Procesando el captcha", 1);
            
        }
    }

    public static function exito(){
        $message['message'] = "solicitud completada exitosamente";
        $message['result'] = true;
        $message = json_encode( $message , JSON_FORCE_OBJECT );
        echo( $message );
    }
    
    public static function fallo( Exception $e ){
        $error['message'] = "ha ocurrido un error al completar la solicitud" . $e->getMessage() . $e->getPrevious();
        $error['result'] = false;
        $error = json_encode( $error , JSON_FORCE_OBJECT );
        echo( $error );
    }

}