<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Formation</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.header{
    display: flex;
    justify-content: space-between;
}

a{
    border: 0.5px solid black;
    border-radius : 4px;
    text-decoration: none;
    text-align: center;
    padding: 10px;
    padding-left: 20px;
    padding-right: 20px;
    background-color: #005c3d;
    color: #ffff;
    height: 20px;
}

.header{
    display: flex;
    justify-content: space-between;
}

.container {
    background-color: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 95%;
}

form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-row1 {
    display: flex;
    gap: 10px;
    width: 50%;

}

.form-group {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

input[type="text"], input[type="number"], select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

input [type="date"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

button {
    grid-column: span 2;
    padding: 10px;
    background-color: #005c3d;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

@media (max-width: 600px) {
    form {
        grid-template-columns: 1fr;
    }
}

.form-group1 {
  display: flex;
  gap: 10px;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Ajouter une Formation</h2>
            <a href="../formations/ajouter.php">Retour</a>
        </div>
        <hr> <br>
        <form action="process_form.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="formation-type">Type de formation</label>
                    <input type="text" id="formation-type" name="formation_type" list="formation-types" required>
                    <datalist id="formation-types">
                        <option value="Formation académique">
                        <option value="Formation professionnelle">
                    </datalist>
                </div> <br>
                <div class="form-group">
                    <label for="school">École/Institut</label>
                    <input type="text" id="school" name="ecole_institut" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="education-level">Niveau d'étude</label>
                    <input type="text" id="education-level" name="niveau_etude" list="education-levels" required>
                    <datalist id="education-levels">
                        <option value="Bac">
                        <option value="Bac+2">
                        <option value="Bac+3">
                        <option value="Bac+5">
                        <option value="Plus">
                    </datalist>
                </div> <br>
                <div class="form-group">
                    <label for="degree-title">Intitulé du diplôme</label>
                    <input type="text" id="degree-title" name="intitule_diplome" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="study-domain">Domaine de formation</label>
                    <input type="text" id="study-domain" name="domaine_formation" required>
                </div> <br>
                <div class="form-group">
                    <label for="start-year">Année de début de la formation</label>
                    <input type="date" id="start-year" name="annee_debut" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="end-year">Année de fin de la formation</label>
                    <input type="date" id="end-year" name="annee_fin" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="diplome-file">Importer le diplôme</label>
                    <input type="file" id="diplome-file" name="fichier_diplome" required>
                </div>
            </div> <hr>
            <div>
                <button type="submit">Ajouter</button>
            </div>
        </form>
    </div>
</body>
</html>
