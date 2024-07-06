<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bp";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Requête pour récupérer toutes les candidatures
$sql = "SELECT * FROM candidat";
$result = $conn->query($sql);

$url = "../generate_pdf.php";
$texte ="Voir plus";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <style>
        .link{
            text-decoration: none;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
                <a href="../admin/admin.php"><img src="../img/layout.png" alt=""> <span>Tableau de bord</span></a>
                <a href="../admin/ajouter_poste.php"><img src="../img/add.png" alt=""> <span>Ajouter un poste</span></a>
                <a href="../admin/retirer_poste.php"><img src="../img/remove.png" alt=""> <span>Retirer un poste</span></a>
                <a href="../admin/consulter_candidature.php" class="active"><img src="../img/marked-book.png" alt=""> <span>Canditatures</span></a>
                <a href="logout.php"><img src="../img/logout.png" alt=""><span>Se déconnecter</span></a>
            </ul>
        </nav>
    </div>
    <div class= "main-content">
    <div class="acceuil">
            <img src="../img/accueil_1.jpeg" alt="" class="img">
        </div> <br>
        <table>
        <tr>
            <th>Nom </th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Détails</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["nom"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["prenom"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["telephone"]) . "</td>";
                echo "<td> <a href=\"$url\">$texte</a> </td>";
            }
        } else {
            echo "<tr><td colspan='4'>Aucune candidature trouvée</td></tr>";
        }
        ?>
    </table>
    </div>
</body>