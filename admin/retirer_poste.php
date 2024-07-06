<?php
require 'includes/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $poste_id = $_POST['poste_id'];

    $stmt = $pdo->prepare("DELETE FROM postes WHERE id = :id");
    $stmt->execute(['id' => $poste_id]);

    echo "Poste retiré avec succès.";
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

        input[type="number"],
        textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 50%;
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
                <a href="../admin/ajouter_poste.php"><img src="../img/add.png" alt=""> <span>Ajouter un poste</span></a>
                <a href="../admin/retirer_poste.php" class="active"><img src="../img/remove.png" alt=""> <span>Retirer un poste</span></a>
                <a href="../admin/consulter_candidature.php"><img src="../img/marked-book.png" alt=""> <span>Canditatures</span></a>
                <a href="logout.php"><img src="../img/logout.png" alt=""><span>Se déconnecter</span></a>
            </ul>
        </nav>
    </div>
    <div class= "main-content">
        <div class="acceuil">
            <img src="../img/accueil_1.jpeg" alt="" class="img">
        </div> <br>
        <form method="POST" action="retirer_poste.php">
            <h2>Retirer un Poste</h2>
            <label for="poste_id">ID du Poste :</label>
            <input type="number" id="poste_id" name="poste_id" required> <br>
            <div>
                <button type="submit">Retirer</button>
            </div>
        </form>
    </div>
</body>
</html>