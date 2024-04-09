<?php

$name = $_POST["isim"];
$email = $_POST["eposta"];
$subject = $_POST["baslik"];
$message = $_POST["mesaj"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "mail.tgg.com.tr"; 
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "website@tgg.com.tr"; 
$mail->Password = "*******"; 

$mail->SetFrom($mail->Username, 'TGG Web Stesi');
$mail->AddAddress('kulmert@gmail.com', '
'); 

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AltBody = $name;



$mail->send();

header("Location: gonder.html");
