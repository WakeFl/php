<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once __DIR__ . "/../libs/Exception.php";
require_once __DIR__ . "/../libs/SMTP.php";
require_once __DIR__ . "/../libs/PHPMailer.php";

$fullName = $_POST['full_name'] ;
$email = $_POST['email'] ;
$phone = $_POST['phone'] ;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.ukr.net ';                     //Set the SMTP server to send through              //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mega-php@ukr.net';                     //SMTP username
    $mail->Password   = 'uVL5J3hLjuLTV3z8';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mega-php@ukr.net', 'My site');
    $mail->addAddress('mega-php@ukr.net', 'My Site');     //Add a recipient
    

    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Сообщение от $fullName";
    $mail->Body    = "Имя : $fullName <br> Email : $email <br> Телефон : $phone ";
    
    $mail->send();
    header("Location: /");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}