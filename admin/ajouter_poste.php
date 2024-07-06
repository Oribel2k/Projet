<?php
require 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO postes (titre, description) VALUES (:titre, :description)");
    $stmt->execute(['titre' => $titre, 'description' => $description]);

    echo "Poste ajouté avec succès.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .add {
        display: flex;
        flex-direction: column;
        width: 65%;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
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
                <a href="../admin/ajouter_poste.php" class="active"><img src="../img/add.png" alt=""> <span>Ajouter un poste</span></a>
                <a href="../admin/retirer_poste.php"><img src="../img/remove.png" alt=""> <span>Retirer un poste</span></a>
                <a href="../admin/consulter_candidature.php"><img src="../img/marked-book.png" alt=""> <span>Canditatures</span></a>
                <a href="../logout.php"><img src="../img/logout.png" alt=""><span>Se déconnecter</span></a>
            </ul>
        </nav>
    </div>
    <div class= "main-content">
        <div class="acceuil">
            <img src="../img/accueil_1.jpeg" alt="" class="img">
        </div> <br>
        <h1>Ajouter des Postes</h1>
        <form method="POST" action="ajouter_poste.php" class="add">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required> <br>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea> <br>
            <div>
                <button type="submit">Ajouter</button>
            </div>
        </form>
    </div>

</body>
</html>