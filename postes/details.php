<?php
// 1. Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bp', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}

// 2. Récupération des détails du poste
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $pdo->prepare("SELECT * FROM postes WHERE id = ?");
    $stmt->execute([$id]);
    $poste = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$poste) {
        die("Poste non trouvé.");
    }
} else {
    die("ID non fourni.");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Poste</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .post-details {
            border: 1px solid #ddd;
            padding: 10px;
        }
        .post-title {
            font-size: 24px;
            font-weight: bold;
        }
        .post-date {
            color: #888;
        }
        .post-description {
            margin-top: 10px;
            font-size: 16px;
        }
        .post-location, .post-salaire {
            margin-top: 5px;
        }
        .back-button {
            padding: 5px 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Détails du Poste</h1>
    <div class="post-details">
        <div class="post-title"><?= htmlspecialchars($poste['titre']) ?></div>
        <div class="post-date">Publié le: <?= htmlspecialchars($poste['date_creation']) ?></div>
        <div class="post-description"><?= nl2br(htmlspecialchars($poste['description'])) ?></div>
    </div>
    <a href="postes.php"><button class="back-button">Retour</button></a>
</body>
</html>
