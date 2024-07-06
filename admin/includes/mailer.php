<?php
require 'vendor/autoload.php';

function envoyerEmail($email, $sujet, $message) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Remplacez par votre serveur SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'votre_email@example.com'; // Remplacez par votre email
    $mail->Password = 'votre_mot_de_passe'; // Remplacez par votre mot de passe
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('votre_email@example.com', 'Nom de l\'expéditeur');
    $mail->addAddress($email);
    $mail->Subject = $sujet;
    $mail->Body = $message;

    if(!$mail->send()) {
        echo 'Erreur: ' . $mail->ErrorInfo;
    }
}
?>
