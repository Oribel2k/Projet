<?php
// Démarre une session si ce n'est pas déjà fait
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
if (!isset($_SESSION['find']) || $_SESSION['find'] !== true) {
    header('Location: index.php');
    exit();
}

// Redirige les agents vers leur propre tableau de bord
if ($_SESSION['role'] !== 'dg') {
    header('Location: dashboard.php');
    exit();
}

?>
<?php
// Inclure la connexion à la base de données
include 'file1.php';

// Initialiser le compteur de nouvelles demandes
$validate_requests_count = 0;
$rejected_requests_count = 0;


$sql = "SELECT COUNT(*) as validate_requests_count FROM demandes WHERE statut = 'validé'";
if ($result = $conn->query($sql)) {
    if ($row = $result->fetch_assoc()) {
        $validate_requests_count = $row['validate_requests_count'];
    }
} else {
    // Afficher l'erreur si la requête échoue
    echo "Erreur de requête SQL: " . $conn->error;
}

$sql1 = "SELECT COUNT(*) as rejected_requests_count FROM demandes WHERE statut = 'rejeté'";
if ($result = $conn->query($sql1)) {
    if ($row = $result->fetch_assoc()) {
        $rejected_requests_count = $row['rejected_requests_count'];
    }
} else {
    // Afficher l'erreur si la requête échoue
    echo "Erreur de requête SQL: " . $conn->error;
}

$new_requests_count = $validate_requests_count + $rejected_requests_count;


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord du DG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header h1{
            margin-left : 200px;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
        }
        .sidebar .header {
            padding: 20px;
            text-align: center;
            background-color: #005c3d; /* Adjust this to match your theme */
            color: #fff;
        }
        .sidebar nav a {
            padding: 15px 20px;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .sidebar nav a:hover {
            background-color: #f4f4f4;
        }
        .sidebar nav a span {
            margin-left: 10px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .main-content .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .main-content .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .card {
            background-color: #ECF0F1;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-t {
            display: flex;
            flex-direction : row;
            justify-content: space-around;
        }

        .card h3 {
            margin-top: 0;
        }

        .card p {
            font-size: 1.5em;
            font-weight: bold;
            text-align: center;
        }
        
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="header">
            <h2>Admin Panel</h2>
        </div>
        <nav>
            <a href="dashboard_dg.php"><span>🏠</span>Tableau de bord</a>
            <a href="#"><span>📊</span>Rapports</a>
            <a href="#"><span>⚙️</span>Paramètre</a>
            <a href="#"><span>🗣️</span>Plaintes</a>
            <a href="logout.php"><span>🔴</span>Se déconnecter</a>
        </nav>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Tableau de bord du DG</h1>
        </div>
        <div class="card-t">
            <div class= "card">
                <h3>Total des demandes</h3>
                <p id="new-requests-count"><?php echo $new_requests_count; ?></p>
            </div>
            <div class= "card">
                <h3>Demandes refusées</h3>
                <p id="rejected-requests-count"><?php echo $rejected_requests_count; ?></p>
            </div>
            <div class= "card">
                <h3>Demandes validées</h3>
                <p id="validate-requests-count"><?php echo $validate_requests_count; ?></p>
            </div>
        </div>
    </div>
</body>
</html>