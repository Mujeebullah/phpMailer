<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//path to exception and other files
require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
try{
$mail->isSMTP(); 
$mail->SMTPDebug = 2; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = "587"; // typically 587 
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = "wasim.mailer@gmail.com";
$mail->Password = "abcd_1234";

//Recipients
$mail->setFrom("wasim.mailer@gmail.com", "Wasim Ahmad");
$mail->addAddress("khanmujeebullah@gmail.com ", "Mujeebullah Khan");
// $mail->addReplyTo('info@example.com', 'Information');
//     $mail->addCC('cc@example.com');
//     $mail->addBCC('bcc@example.com');


//Content
$mail->Subject = 'Hello Testing server from wasim.mailer';
$message = file_get_contents('message.html');
$mail->msgHTML($message);
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
// $mail->addAttachment('docs/brochure.pdf'); //Attachment, can be skipped
$mail->send();
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
