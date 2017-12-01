<?php
session_start();
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->SMTPDebug = 4;
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "mobcinav@gmail.com";
$mail->Password = "mestnaobcina1";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->Subject = "Obvestilo";
$mail->Body = "BlaBla";
$mail->setFrom('mobcinav@gmail.com', 'MOV');
$mail->addAddress($_SESSION['mail']);
if($mail->send())
{
    echo 'mail sent';
}
else
{
   echo 'Something went wrong';
}
