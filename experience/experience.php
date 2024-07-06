<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'expérience</title>
    <style>
        /* styles.css */

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
width: 100%;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Ajouter une expérience</h2>
            <a href="../experiences/ajouter.php">Retour</a>
        </div>
        <hr> <br>
        <form action="../experience/process_form.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group">
                    <label for="structure">Structure *</label>
                    <input type="text" id="structure" name="structure"  required>
                </div> <br>
                <div class="form-group">
                    <label for="date_debut">Date début *</label>
                    <input type="date" id="date_debut" name="date_debut" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="intitule_poste">Intitulé du poste *</label>
                    <input type="text" id="intitule_poste" name="intitule_poste"  required>
                </div> <br>
                <div class="form-group">
                    <label for="date_fin">Date fin *</label>
                    <input type="date" id="date_fin" name="date_fin" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="description">Description : *</label>
                    <input type="text" id="description" name="description" required>
                </div>
            </div> <br>
            <div >
                <button type="submit">Ajouter</button>
            </div>

        </form>
    </div>
</body>
</html>