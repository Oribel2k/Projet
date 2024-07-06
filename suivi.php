<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur MySQL
$password = ""; // Remplacez par votre mot de passe MySQL
$dbname = "bp"; // Remplacez par le nom de votre base de données

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Vérification si les données sont soumises
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $code = $_POST['code'];

    // Requête pour vérifier la concordance des informations
    $sql = "SELECT statut FROM demandes WHERE email = ? AND code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $code);
    $stmt->execute();
    $stmt->store_result();

    // Si une correspondance est trouvée, rediriger vers la page de statut
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($statut);
        $stmt->fetch();
        // Redirection vers la page de statut avec le paramètre statut
        header("Location: statut.php?statut=$statut");
        exit();
    } else {
        echo "Email ou code incorrect.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/suivi.css">
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
                    <li><a href="suivi.php" class="active">Statut de la demande</a></li>
                    <li><a href="plaintes.php">Plaintes et Réclamations</a></li>
                    <li><a href="FAQ.html">FAQs</a></li>
                </ul>
            </nav>
        </div>
    </header>  <br>
    <div class="verification-container">
        <form class="verification-form" action="" method="post">
            <h2>Entrez votre email</h2>
                <input type="text" id="email" name="email" placeholder="abcd@gmail.com" required>
            <h2>Entrez votre code de vérification</h2>
                <input type="text" id="code" name="code" placeholder="Code de vérification : AB34ZX0W" required>
            <button type="submit" class="submit-button">Soumettre</button>
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