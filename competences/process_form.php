<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'bp';
$username = 'root'; // Modifiez avec votre nom d'utilisateur MySQL
$password = ''; // Modifiez avec votre mot de passe MySQL

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

// Récupérer les données du formulaire
$type = $_POST['type'];
$niveau = $_POST['niveau'];

// Insérer les données dans la base de données
$sql = "INSERT INTO competences (type, niveau)
        VALUES (:type, :niveau)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':niveau', $niveau);


if ($stmt->execute()) {
    echo "Formation ajoutée avec succès.";
    header("Location: ../competences/ajouter.php");
    die();
} else {
    echo "Erreur lors de l'ajout de la formation.";
}
?>