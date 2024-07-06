<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeninPetro Formulaire de Soumission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            background-color: #005c3d; /* Adjust this to match the green color of the logo */
            width: 100%;
            text-align: center;
            padding: 5px;
        }
        .header img {
            max-width: 100%;
            height: 90px;
        }
        .container {
            padding: 20px;
            width: 100%;
            max-width: 600px;
        }
        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #1e5b25;
            color: white;
            border: none;
            font-weight: bolder;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 15px;
            width: 130px;
            margin-left: 190px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="img\BENIN PETRO b.png" alt="BeninPetro Logo">
    </div>
    <div class="container">
        <?php
        // Récupérer le statut à partir de la requête GET
        $statut = isset($_GET['statut']) ? $_GET['statut'] : '';

        // Afficher le statut
        echo "Votre statut actuel est : $statut";
        ?>
    </div>
    