<?php
<<<<<<< HEAD
// // Connexion à la base de données
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "bp";

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Vérifier la connexion
// if ($conn->connect_error) {
//     die("Connexion échouée: " . $conn->connect_error);
// }

// // Récupérer les données du formulaire
// $nom = $_POST['nom'];
// $prenom = $_POST['prenom'];
// $email = $_POST['email'];
// $message = $_POST['message'];

// // Valider les données (exemple de base)
// if (empty($nom) || empty($prenom) || empty($email) || empty($message)) {
//     echo "Veuillez remplir tous les champs.";
//     exit;
// }

// // Préparer et exécuter la requête SQL
// $sql = "INSERT INTO plaintes (nom, prenom, email, message) VALUES (?, ?, ?, ?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ssss", $nom, $prenom, $email, $message);
// $stmt->execute();

// // Envoyer un email à l'adresse spécifique
// $to = "orgbtech@gmail.com";
// $subject = "Nouvelle plainte reçue";
// $body = "Nom: " . $nom . "\nPrénom: " . $prenom . "\nEmail: " . $email . "\nMessage: " . $message;
// mail($to, $subject, $body);

// // Envoyer un accusé de réception à l'expéditeur
// $expediteur = $prenom . " " . $nom;
// $sujet_accuse = "Accusé de réception de votre plainte";
// $message_accuse = "Bonjour " . $expediteur . ",\n\nNous avons bien reçu votre plainte :\n" . $message . "\n\nNous vous contacterons sous peu.";
// mail($email, $sujet_accuse, $message_accuse);

// echo "Votre plainte a été enregistrée avec succès.";

// // Fermer la connexion à la base de données
// $stmt->close();
// $conn->close();
=======
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bp";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$message = $_POST['message'];

// Valider les données (exemple de base)
if (empty($nom) || empty($prenom) || empty($email) || empty($message)) {
    echo "Veuillez remplir tous les champs.";
    exit;
}

// Préparer et exécuter la requête SQL
$sql = "INSERT INTO plaintes (nom, prenom, email, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nom, $prenom, $email, $message);
$stmt->execute();

// Envoyer un email à l'adresse spécifique
$to = "orgbtech@gmail.com";
$subject = "Nouvelle plainte reçue";
$body = "Nom: " . $nom . "\nPrénom: " . $prenom . "\nEmail: " . $email . "\nMessage: " . $message;
mail($to, $subject, $body);

// Envoyer un accusé de réception à l'expéditeur
$expediteur = $prenom . " " . $nom;
$sujet_accuse = "Accusé de réception de votre plainte";
$message_accuse = "Bonjour " . $expediteur . ",\n\nNous avons bien reçu votre plainte :\n" . $message . "\n\nNous vous contacterons sous peu.";
mail($email, $sujet_accuse, $message_accuse);

echo "Votre plainte a été enregistrée avec succès.";

// Fermer la connexion à la base de données
$stmt->close();
$conn->close();
>>>>>>> b0c3ac395fcb766bf923768278e9d0e5b681f053
?>