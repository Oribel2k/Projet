<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bp');

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Exécutez la requête SQL pour récupérer les utilisateurs
$sql = "SELECT email, password FROM login";
$result = $conn->query($sql);

if ($result === false) {
    die("Erreur de requête SQL: " . $conn->error);
}

$users = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'email' => $row['email'],
            'password' => $row['password'],
        ];
    }
}

$conn->close();
?>
