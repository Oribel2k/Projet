<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'bp';
$username = 'root';  // À adapter selon votre configuration
$password = '';      // À adapter selon votre configuration

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données de la base de données...
    
    // Prépare la requête SQL pour récupérer les données triées par date d'envoi
    $sql = "SELECT * FROM contacts ORDER BY date_envoi ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benin Petro Dashboard</title>
    <link rel="stylesheet" href="style/db1.css">
    <script src="script/script"></script>
</head>
<body>
    <div class="header">
        <img src="img/BENIN PETRO b.png" alt="Benin Petro">
        <div class="agent-name"> 🏡 <u>Tableau de bord</u> </div>
        <div class="agent-name">John Doe</div>
        
    </div>
    <div class="dashboard">
        <div class="sidebar">
            <ul>
                <li><a href="dashboard.php"><img src="img/new-document.png" alt=""> Nouvelles demandes</a></li>
                <li><a href="demandes_validees.php"><img src="img/approval.png" alt=""> Demandes validées</a></li>
                <li><a href="demandes_rejetees.php"><img src="img/delete.png" alt="">  Demandes refusées</a></li>
                <li><a href="contacts.php"  class="active"><img src="img/complaint.png" alt="">  Plaintes</a></li>
                <li><a href="logout.php"><img src="img/logout.png" alt="">  Se déconnecter</a></li>
            </ul>
        </div>
        <div class="main-content">
        <h1>Plaintes et Réclamations</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date d'Envoi</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?= $contact['nom'] ?></td>
            <td><?= $contact['prenom'] ?></td>
            <td><?= $contact['email'] ?></td>
            <td><?= $contact['message'] ?></td>
            <td><?= $contact['date_envoi'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
        </div>
    
</body>
</html>
