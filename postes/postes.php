<?php
// 1. Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bp', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}

// 2. Récupération des données des postes
$stmt = $pdo->query("SELECT id, titre, date_creation FROM postes");
$postes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .post-container {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        .post-title {
            font-size: 20px;
            font-weight: bold;
        }
        .post-date {
            color: #888;
        }
        .post-button {
            padding: 5px 10px;
            background-color: #005c3d;
            color: white;
            border: none;
            cursor: pointer;
        }
        .post-button:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="header">
            <img src="../img/BENIN PETRO b.png" alt="" class="title">
        </div> <br>
        <nav>
            <ul>
                <a href="../accueil.php"><img src="../img/layout.png" alt=""> <span>Tableau de bord</span></a>
                <a href="postes.php" class="active"><img src="../img/job-seeker.png" alt=""> <span>Postes disponibles</span></a>
                <a href="../formations/ajouter.php"><img src="../img/reading-book.png" alt=""> <span>Formations</span></a>
                <a href="../experience/ajouter.php"><img src="../img/certification.png" alt=""> <span>Expériences</span></a>
                <a href="../competences/ajouter.php"><img src="../img/competence.png" alt=""> <span>Compétences</span></a>
                <a href="../logout.php"><img src="../img/logout.png" alt=""> <span>Se déconnecter</span></a>
            </ul>
        </nav>
    </div>
    <div class= "main-content">
        <div class="acceuil">
            <img src="../img/accueil_1.jpeg" alt="" class="img">
        </div> <br>
        <h1>Postes Disponibles</h1>
        <?php foreach ($postes as $poste): ?>
            <div class="post-container">
                <div class="post-title"><?= htmlspecialchars($poste['titre']) ?></div>
                <div class="post-date">Publié le: <?= htmlspecialchars($poste['date_creation']) ?></div>
                <a href="details.php?id=<?= $poste['id'] ?>"><button class="post-button">Plus</button></a>
                <a href="../candidats/candidats.php?id=<?= $poste['id'] ?>"><button class="post-button">Postuler</button></a>
            </div>
        <?php endforeach; ?>
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
</body>