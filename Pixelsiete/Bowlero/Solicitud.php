<?php
namespace Pixelsiete\Bowlero;

class Solicitud{
    public $valores;
    public $tabla;
    public $emailConfig;

    public function __construct( Array $post, Array $valores, String $tabla, Array $emailConfig ){
        $this->post = $post;
        $this->valores = $valores;
        $this->tabla = $tabla;
        $this->emailConfig = $emailConfig;
    }

    public function ejecutar(){
        $asuntoDelMail = "Boliches AMF - ".str_replace( '-',' ',strtoupper( $solicitud->asuntoDelMail ) )  ."";
    }
}