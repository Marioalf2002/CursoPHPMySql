<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';


enviarEmail();

function enviarEmail(){
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment'])){
        //mandar correo
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                   // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'marioalf200216@gmail.com';                 // SMTP username
            $mail->Password = 'vlylfpewbhwknqxx';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('marioalf200216@gmail.com', 'PHPMailer');
            $mail->addAddress('ilikeelectronic16@gmail.com', 'PHPMailer');     // Add a recipient
            $mail->addAddress('lagranobra@gmail.com', 'PHPMailer');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Correo de contacto';
            $mail->Body    = 'Nombre: ' . $name . '<br/>Correo: ' . $email . '<br/>' . $comment;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

    }else{
        return;
    }
}

?>
