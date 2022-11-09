<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = '[Vision Training Centre] Client Messages from';
    $messages = $_POST['messages'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'visiontrainingtestmailer@gmail.com';
        $mail->Password   = 'yollzsmljkjyhckx';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
    
        //Recipients
        $mail->setFrom('ghufranafi3@gmail.com', 'Afi');
        $mail->addAddress('visiontrainingtestmailer@gmail.com'); 
    
        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject . ' ' . $name;
        $mail->Body    = $messages . ' ' . $email;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
        header('Location: contact-us.html');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
