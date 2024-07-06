<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bp');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($id > 0 && ($action == 'valider' || $action == 'rejeter')) {
    // Détermination du nouveau statut
    $new_status = $action == 'valider' ? 'validé' : 'rejeté';

    // Mise à jour du statut dans la base de données
    $sql = "UPDATE demandes SET statut = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $new_status, $id);

    if ($stmt->execute()) {
        echo "Statut mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du statut.";
    }

    $stmt->close();
} else {
    echo "ID ou action invalide.";
}

$conn->close();

// Redirection vers la page de détails après la mise à jour
header("Location: dashboard.php");
exit();
?>
