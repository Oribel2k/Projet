<?php
require 'vendor/autoload.php'; // Assurez-vous que cette ligne est correcte pour charger PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "bp"; // Remplacez par le nom de votre base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $statut = "en cours"; // Valeur par défaut pour le statut

    // Validation des données
    if (empty($titre) || empty($description) || empty($email)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }

    // Génération du code unique
    $unique_code = substr(md5(uniqid(mt_rand(), true)), 0, 8);

    // Insertion des données dans la base de données
    $sql = "INSERT INTO demandes (titre, description, email, statut, code) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Erreur de préparation de la requête: " . $conn->error;
        exit;
    }

    $stmt->bind_param('sssss', $titre, $description, $email, $statut, $unique_code);

    if ($stmt->execute()) {
        // Envoi de l'email avec PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Paramètres du serveur
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'orgbtech@gmail.com'; // Votre adresse e-mail Gmail
            $mail->Password = 'xykb slqa ttpc kfhp'; // Votre mot de passe Gmail ou App password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinataires
            $mail->setFrom('orgbtech@gmail.com', 'BENIN PETRO'); // Remplacez par votre adresse e-mail
            $mail->addAddress($email);

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation de demande et code unique';
            $mail->Body    = "Votre demande a été soumise avec succès. Votre code unique est : $unique_code";

            $mail->send();
            // Redirection après le succès
            header("Location: accueil.php");
            die();
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    } else {
        echo "Erreur lors de la soumission de la demande: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>