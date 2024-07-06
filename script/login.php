<?php
// Les informations d'identification stockées en dur (dans un environnement de production réel, vous devriez utiliser une méthode plus sécurisée)
$credentials = array(
    "utilisateur1" => "motdepasse1",
    "utilisateur2" => "motdepasse2",
    // Ajoutez autant de paires nom d'utilisateur/mot de passe que nécessaire
);

// Récupération des données du formulaire
$username = $_POST['identifiant'];
$password = $_POST['password'];

// Vérification des informations d'identification
if (isset($credentials[$username]) && $credentials[$username] === $password) {
    // Authentification réussie, rediriger vers la page souhaitée
    header("Location: dahboard.php");
    exit();
} else {
    // Identifiants invalides, rediriger vers la page de connexion avec un message d'erreur
    header("Location: page_connexion.php?erreur=1");
    exit();
}
?>
