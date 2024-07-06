<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bp');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération de l'ID de la demande
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Récupération des détails de la demande
    $sql = "SELECT * FROM demandes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/details.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Détails de la demande</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/BENIN PETRO b.png" alt="Benin Petro">
        </div>
    </header>

        <h1>Détails de la demande</h1>
        <?php
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1 class='info-value'>N° " . htmlspecialchars($row["id"]) . "</h1>";
            echo "<p class='info-value'>Titre: " . htmlspecialchars($row["titre"]) . "</p>";
            echo "<p class='info-value'>Description: " . htmlspecialchars($row["description"]) . "</p>";
            echo "<p class='info-value'>Email: " . htmlspecialchars($row["email"]) . "</p>";
            echo "<p class='info-value'>Statut: " . htmlspecialchars($row["statut"]) . "</p>";
            echo "<form action='update_status.php' method='post' class='button-group'>";
            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
            echo "<button type='submit' name='action' value='valider' class='valider'>Valider</button>";
            echo "<button type='submit' name='action' value='rejeter' class='rejeter'>Rejeter</button>";
            echo "</form>";
        } else {
            echo "Demande non trouvée ou ID invalide.";
        }

        $stmt->close();
        $conn->close();
        ?>

    <div class="fixed-bottom">
        <div class="whatsapp-icon">
            <a href="https://wa.me/yourwhatsappnumber" target="_blank">
                <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
            </a>
        </div>
        <br>
        <br>
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
