<?php
// Spécifie le fuseau horaire à "Europe/Paris" (à adapter selon votre pays)
date_default_timezone_set('Africa/Porto-Novo');

// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'bp';
$username = 'root';  // À adapter selon votre configuration
$password = '';      // À adapter selon votre configuration

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupère les données du formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Récupère la date et l'heure actuelles
        $date_envoi = date('Y-m-d H:i:s');

        // Prépare la requête SQL pour insérer les données
        $sql = "INSERT INTO contacts (nom, prenom, email, message, date_envoi) VALUES (:nom, :prenom, :email, :message, :date_envoi)";
        $stmt = $pdo->prepare($sql);

        // Exécute la requête avec les données du formulaire
        $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'message' => $message, 'date_envoi' => $date_envoi]);

        // Redirige vers la page de formulaire avec un paramètre de succès
        header("Location: plaintes.php?success=1");
        exit;
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/plaintes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="script/script.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <img src="img/BENIN PETRO b.png" alt="" class="title">
        <div class="navbar">
            <nav class="navmenu">
                <ul>
                    <li><a href="accueil.php" >Nouvelle demande</a></li>
                    <li><a href="suivi.php" >Statut de la demande</a></li>
                    <li><a href="plaintes.html" class="active">Plaintes et Réclamations</a></li>
                    <li><a href="FAQ.html">FAQs</a></li>
                </ul>
            </nav>
        </div>
    </header> 
    <div class="form-container">
        <h1>Pour toutes vos préoccupations</h1>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
                </div>
            </div>
            <div class="form-groups">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="exemple123@gmail.com" required></input>
            </div> <br>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Message..." required></textarea>
            </div>
            <button type="submit" class="submit-button" value="Soumettre">Soumettre</button>
        </form>
    </div>
    <div class="fixed-bottom">
        <div class="whatsapp-icon">
            <a href="https://wa.me/+22966342020" target="_blank">
                <img src="img/whatsapp.png" alt="WhatsApp">
            </a>
        </div> <br> <br>
        <footer class="footer">
            <div class="footer-content">
                <div class="copyright">
                    Copyright 2024 
                </div>
            </div>
        </footer>
    </div>
</body>
</html>