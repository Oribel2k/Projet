<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bp";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['phone'];
    $email = $_POST['email'];
    $sexe = $_POST['sexe'];
    $naissance = $_POST['naissance'];
    $commune = $_POST['commune'];
    $quartier = $_POST['quartier'];
    $situation = $_POST['situation'];
    $departement = $_POST['departement'];
    $motivation = $_POST['motivation'];

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Préparation et exécution de la requête SQL
    $sql = "INSERT INTO candidat (nom, prenom, email, telephone, sexe, date_naissance, departement, commune, quartier, situation, motivation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erreur de préparation : " . $conn->error);
    }

    $stmt->bind_param("sssssssssss", $nom, $prenom, $email, $telephone, $sexe, $naissance, $departement, $commune, $quartier, $situation, $motivation);

    if ($stmt->execute()) {
        // Fermeture de la connexion
        $stmt->close();
        $conn->close();

        // Redirection vers une page de confirmation
        header("Location: ../postes/postes.php");
        exit();
    } else {
        if ($conn->errno == 1062) {  // Code d'erreur MySQL pour les doublons
            echo "Cette adresse email est déjà utilisée. Veuillez en choisir une autre.";
        } else {
            echo "Erreur : " . $stmt->error;
        }
    }

    // Fermeture de la connexion
    $stmt->close();
    $conn->close();
}
?>