<?php
// Démarre une session si ce n'est pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
                <li><a href="dashboard.php" class="active"><img src="img/new-document.png" alt=""> Nouvelles demandes</a></li>
                <li><a href="demandes_validees.php"><img src="img/approval.png" alt=""> Demandes validées</a></li>
                <li><a href="demandes_rejetees.php"><img src="img/delete.png" alt="">  Demandes refusées</a></li>
                <li><a href="contacts.php"><img src="img/complaint.png" alt="">  Plaintes</a></li>
                <li><a href="logout.php"><img src="img/logout.png" alt="">  Se déconnecter</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="content-body">
            <?php
            // Connexion à la base de données
            $conn = new mysqli('localhost', 'root', '', 'bp');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Récupération des demandes triées par id décroissant
            $sql = "SELECT id, titre, statut FROM demandes ORDER BY id DESC";
            $result = $conn->query($sql);
            ?>

        <table>
            <tr>
                <th>N°</th>
                <th>Titre de la demande</th>
                <>Statut</>
                <>Action</>
            </tr>
    <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['titre']; ?></td>
                        <td><?php echo $row['statut']; ?></td>
                        <td>
                            <form action="details.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit">Voir les détails</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Aucune demande en attente</td>
                </tr>
            <?php endif; ?>
    </tbody>
</table>

<?php
$conn->close();
?>
            </div>
        </div>
    </div>
</body>
</html>