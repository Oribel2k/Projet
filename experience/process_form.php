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
$structure = $_POST['structure'];
$intitule_poste = $_POST['intitule_poste'];
$annee_debut = $_POST['date_debut'];
$annee_fin = $_POST['date_fin'];
$description = $_POST['description'];


// Insérer les données dans la base de données
$sql = "INSERT INTO experiences (structure, intitule_poste, date_debut, date_fin, description)
        VALUES (:structure, :intitule_poste, :date_debut, :date_fin, :description)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':structure', $structure);
$stmt->bindParam(':intitule_poste', $intitule_poste);
$stmt->bindParam(':date_debut', $annee_debut);
$stmt->bindParam(':date_fin', $annee_fin);
$stmt->bindParam(':description', $description);

if ($stmt->execute()) {
    echo "Formation ajoutée avec succès.";
    header("Location: ../experience/ajouter.php");
    die();
} else {
    echo "Erreur lors de l'ajout de l'expérience.";
}
?>