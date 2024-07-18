<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="script/script.js"></script>
    <title>Ajouter expérience</title>
    <style>
        .fi {
            text-decoration : none;
            color : #fff;
            border : solid 2px;
            padding : 10px;
            border-radius : 10px;
            background-color : green;
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
                <a href="../postes/postes.php"><img src="../img/job-seeker.png" alt=""> <span>Postes disponibles</span></a>
                <a href="../formations/ajouter.php"><img src="../img/reading-book.png" alt=""> <span>Formations</span></a>
                <a href="../experience/ajouter.php" class="active"><img src="../img/certification.png" alt=""> <span>Expériences</span></a>
                <a href="../competences/ajouter.php"><img src="../img/competence.png" alt=""> <span>Compétences</span></a>
                <a href="../logout.php"><img src="../img/logout.png" alt=""><span>Se déconnecter</span></a>
            </ul>

        </nav>
    </div>
    <div class = "main-content">
        <div class="acceuil">
            <img src="../img/accueil_1.jpeg" alt="" class="img">
        </div> <br> 
        <a href="../experience/experience.php" class="fi">Ajouter une expérience professionelle</a>
        <hr>
        
        <?php
            // Connexion à la base de données
            $conn = new mysqli('localhost', 'root', '', 'bp');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Récupération des demandes triées par id décroissant
            $sql = "SELECT structure, intitule_poste, date_debut, date_fin FROM experiences ORDER BY id DESC";
            $result = $conn->query($sql);
            ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Structure</th>
                    <th>Intitulé Poste</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['structure']; ?></td>
                        <td><?php echo $row['intitule_poste']; ?></td>
                        <td><?php echo $row['date_debut']; ?></td>
                        <td><?php echo $row['date_fin']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
            <?php endif; ?>
            </tbody>
        </table>
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
