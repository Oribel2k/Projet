<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="header">
            <img src="../img/BENIN PETRO b.png" alt="" class="title">
        </div> <br>
        <nav>
            <ul>
                <a href="../admin/admin.php" class="active"><img src="../img/layout.png" alt=""> <span>Tableau de bord</span></a>
                <a href="../admin/ajouter_poste.php"><img src="../img/add.png" alt=""> <span>Ajouter un poste</span></a>
                <a href="../admin/retirer_poste.php"><img src="../img/remove.png" alt=""> <span>Retirer un poste</span></a>
                <a href="../admin/consulter_candidature.php"><img src="../img/marked-book.png" alt=""> <span>Canditatures</span></a>
                <a href="../logout.php"><img src="../img/logout.png" alt=""><span>Se déconnecter</span></a>
            </ul>
        </nav>
    </div>
    <div class = "main-content">
        <div class="acceuil">
            <img src="../img/accueil_1.jpeg" alt="" class="img">
        </div> <br>
        <?php
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=bp', 'root', '');

    // Récupération des postes
    $stmt = $pdo->query("SELECT * FROM postes");
    $postes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des postes
    if ($postes) {
        echo "<ul>";
        foreach ($postes as $poste) {
            echo "<li>ID: " . $poste['id'] . " - Titre: " . $poste['titre'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucun poste disponible.</p>";
    }
    ?>
    </div>
    
    <div class="fixed-bottom">
        <div class="whatsapp-icon">
            <a href="https://wa.me/+22966342020" target="_blank">
                <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp">
            </a>
        </div> 
    <br><br>
        <footer class="footer">
            <div class="footer-content">
                <div class="copyright">
                    Copyright 2024 
                </div>
            </div>
        </footer>
    </div>
    <script src="script/script.js"></script>

</body>
</html>