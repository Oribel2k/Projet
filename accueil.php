<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="sidebar">
        <div class="header">
            <img src="img/BENIN PETRO b.png" alt="" class="title">
        </div> <br>
        <nav >
            <ul>
                <a href="accueil.php" class="active"><img src="img/layout.png" alt=""> <span>Tableau de bord</span></a>
                <a href="postes/postes.php"><img src="img/job-seeker.png" alt=""> <span>Postes disponibles</span></a>
                <a href="formations/ajouter.php"><img src="img/reading-book.png" alt=""> <span>Formations</span></a>
                <a href="experience/ajouter.php"><img src="img/certification.png" alt=""> <span>Expériences</span></a>
                <a href="competences/ajouter.php"><img src="img/competence.png" alt=""> <span>Compétences</span></a>
                <a href="logout.php"><img src="img/logout.png" alt=""><span>Se déconnecter</span></a>
            </ul>
        </nav>
    </div>
    <div class = "main-content">
        <div class="acceuil">
            <img src="img/accueil_1.jpeg" alt="" class="img">
        </div> <br>
        <div class="button-container">
            <form action="../BP-services-master/generate_pdf.php" method="post">
                <button type="submit" class="btn" >Générer votre CV</button>
            </form>
        </div>
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