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
$type_formation = $_POST['formation_type'];
$ecole_institut = $_POST['ecole_institut'];
$niveau_etude = $_POST['niveau_etude'];
$intitule_diplome = $_POST['intitule_diplome'];
$domaine_formation = $_POST['domaine_formation'];
$annee_debut = $_POST['annee_debut'];
$annee_fin = $_POST['annee_fin'];

// Gérer l'upload du fichier
$fichier_diplome = NULL;
if (isset($_FILES['fichier_diplome']) && $_FILES['fichier_diplome']['error'] == UPLOAD_ERR_OK) {
    $uploads_dir = 'uploads';
    if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }
    $fichier_diplome = $uploads_dir . '/' . basename($_FILES['fichier_diplome']['name']);
    if (!move_uploaded_file($_FILES['fichier_diplome']['tmp_name'], $fichier_diplome)) {
        $fichier_diplome = NULL;
    }
}

// Insérer les données dans la base de données
$sql = "INSERT INTO formations (type_formation, ecole_institut, niveau_etude, intitule_diplome, domaine_formation, annee_debut, annee_fin, fichier_diplome)
        VALUES (:type_formation, :ecole_institut, :niveau_etude, :intitule_diplome, :domaine_formation, :annee_debut, :annee_fin, :fichier_diplome)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':type_formation', $type_formation);
$stmt->bindParam(':ecole_institut', $ecole_institut);
$stmt->bindParam(':niveau_etude', $niveau_etude);
$stmt->bindParam(':intitule_diplome', $intitule_diplome);
$stmt->bindParam(':domaine_formation', $domaine_formation);
$stmt->bindParam(':annee_debut', $annee_debut);
$stmt->bindParam(':annee_fin', $annee_fin);
$stmt->bindParam(':fichier_diplome', $fichier_diplome);

if ($stmt->execute()) {
    echo "Formation ajoutée avec succès.";
    header("Location: ../formations/ajouter.php");
    die();
} else {
    echo "Erreur lors de l'ajout de la formation.";
}
?>