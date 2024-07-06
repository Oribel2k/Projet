<?php
$servername = "localhost";
$username = "root"; // Votre nom d'utilisateur MySQL
$password = ""; // Votre mot de passe MySQL
$dbname = "bp"; // Nom de votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password']; // Hachage du mot de passe

// Vérifier si l'utilisateur existe déjà
$sql = "SELECT * FROM login WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "L'utilisateur existe déjà.";
} else {
    // Insérer les données dans la base
    $sql = "INSERT INTO login (username, email, password) VALUES ('$user', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "Inscription réussie.";
        // Rediriger vers la page de connexion
        header("Location: accueil.php");
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
