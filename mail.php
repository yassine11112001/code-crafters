<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'C:\xampp\htdocs\reclamation\PHPMailer-master (1)\PHPMailer-master\src\Exception.php';
require_once 'C:\xampp\htdocs\reclamation\PHPMailer-master (1)\PHPMailer-master\src\PHPMailer.php';
require_once 'C:\xampp\htdocs\reclamation\PHPMailer-master (1)\PHPMailer-master\src\SMTP.php';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'yassinekassar2001@gmail.com';
    $mail->Password = 'odwwjwryquvsxhzb';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('yassinekassar2001@gmail.com');
    $mail->addAddress('mouhamedyassine.kassar@esprit.tn');
    $mail->isHTML(true);
    $mail->Subject = 'Reclamation';
    $mail->Body = 'Hello, we answered your reclamation go check it here: http://localhost/reclamation/view/front/checkreclamation.php';
    $mail->send();
    $mail->SMTPDebug = 2;
    echo "Mail envoyé";
?>