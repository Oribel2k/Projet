<?php
// Démarre une session si ce n'est pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Inclut le fichier de connexion à la base de données
require_once __DIR__ . "/file.php";

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $login_success = false;

    foreach ($users as $user) {
        // Vérifie les identifiants et le mot de passe
        if ($user["email"] === $email && $user["password"] === $password) {
            $_SESSION['find'] = true;
            $_SESSION['user'] = $user['username'];
            $login_success = true;
            break;
        }
    }

    if ($login_success) {
        if ($_SESSION['find'] === true) {
            header("Location: accueil.php");
        
    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }
}
}
?>