<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mdp = "";
$nom_db = "bp";

$connexion = new mysqli($serveur, $utilisateur, $mdp, $nom_db);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Récupérer les données de la base de données
$sql = "SELECT id, email, statut FROM demande2";
$resultat = $connexion->query($sql);

if ($resultat->num_rows > 0) {
    // Afficher les données sous forme de tableau
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Email</th>
    <th>Statut</th>
    <th>Action</th>
    </tr>";

    while($ligne = $resultat->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$ligne['id']."</td>";
        echo "<td>".$ligne['email']."</td>";
        echo "<td>".$ligne['statut']."</td>";
        echo "<td>
              <form action='valider.php' method='GET' style='display:inline;'>
                <input type='hidden' name='id' value='".$ligne['id']."'>
                <button type='submit'>Valider</button>
              </form>
              <form action='rejeter.php' method='GET' style='display:inline;'>
                <input type='hidden' name='id' value='".$ligne['id']."'>
                <button type='submit'>Rejeter</button>
              </form>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 résultats";
}

$connexion->close();
?>
