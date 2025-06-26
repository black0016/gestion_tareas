<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeption;
require '../vendor/autoload.php';

class Mail extends PHPMailer {

    public function __construct($exceptions = false){
        parent::__construct($exceptions);
        
        // $this->SMTPDebug = SMTP::DEBUG_SERVER; 
        $this->isSMTP();
        $this->Host = SIROS_MAIL['Host'];
        $this->SMTPAuth = SIROS_MAIL['SMTPAuth'];
        $this->Username = SIROS_MAIL['Username'];
        $this->Password = SIROS_MAIL['Password'];
        $this->SMTPSecure = SIROS_MAIL['SMTPSecure'];
        $this->Port = SIROS_MAIL['Port'];
        // Activo condificación utf-8
        $this->CharSet = SIROS_MAIL['CharSet'];
    }

    public function enviarEmail($mensaje, $asunto, $email, $nombre = '', $file = '', $fileName = '') {

        // Destinatario
        $this->setFrom(SIROS_MAIL['AddressFrom'], SIROS_MAIL['NameFrom']);

        if (is_array($email)) {
            foreach ($email as $key => $value) {
                $this->addAddress($value["email"]);
            }
        } else {
            ($nombre  == '') ? $this->addAddress($email) : $this->addAddress($email, $nombre);
        }
        
        // Archivo Adjunto
        if ($file != '') {
            ($fileName  == '') ? $this->addAttachment($file) : $this->addAttachment($file, $fileName);
        }

        // Contenido
        $this->isHTML(true);
        $this->Subject = $asunto;
        $this->Body = $mensaje;
        $this->AltBody = $mensaje;
    
        // $this->send();
        if (!$this->send()) {
            return false;
        } else {
            return true;
        }
    }
}