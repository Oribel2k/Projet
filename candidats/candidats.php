<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identité</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 700px; /* Adjust the width to fit your design */
}

.user-form h2 {
    text-align: center;
    color: green;
    margin-bottom: 10px;
}

.form-row {
    display: flex;
    gap: 10px; /* Space between columns */
    margin-bottom: 15px;
}

.form-group {
    flex: 1;
}

.form-group.full-width {
    flex: 0;
}

.form-group label {
    display: block;
    color: #555;
    margin-bottom: 5px;
}

.form-group input, .form-group select {
    width: 95%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.form-group textarea {
    width: 98%;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: green;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #3a7dc1;
}

    </style>
</head>
<body>
    <div class="container">
        <form class="user-form" action ="action_page.php" method="POST">
            <h2>Votre identité</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="matricule">Nom</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="sexe">Sexe</label>
                    <select id="sexe" name="sexe">
                        <option value="masculin">Masculin</option>
                        <option value="feminin">Féminin</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="naissance">Date de naissance</label>
                    <input type="date" id="naissance" name="naissance">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="departement">Département</label>
                    <select id="departement" name="departement">
                        <option value="Atacora">Atacora</option>
                        <option value="Atlantique">Atlantique</option>
                        <option value="Alibori">Alibori</option>
                        <option value="Borgou">Borgou</option>
                        <option value="Collines">Collines</option>
                        <option value="Couffo">Couffo</option>
                        <option value="Donga">Donga</option>
                        <option value="Littoral">Littoral</option>
                        <option value="Mono">Mono</option>
                        <option value="Ouémé">Ouémé</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Zou">Zou</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="commune">Commune</label>
                    <input id="commune" name="commune"></input>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="quartier">Quartier</label>
                    <input id="quartier" name="quartier"></input>
                </div>
                <div class="form-group">
                    <label for="situation">Situation matrimoniale</label>
                    <select id="situation" name="situation">
                        <option value="Célibataire sans enfants">Célibataire sans enfants</option>
                        <option value="Marié(e) sans enfants">Marié(e) sans enfants</option>
                        <option value="Célibataire avec enfants">Célibataire avec enfants</option>
                        <option value="Marié(e) avec enfants">Marié(e) avec enfants</option>
                    </select>
                </div>
            </div>
            <div class="form-row">     
                <div class="form-group">
                    <label for="motivation">Motivation</label>
                    <textarea id="motivation" name="motivation"></textarea>
                </div>
            </div>
            <button type="submit">Soumettre</button>
        </form>
    </div>
</body>
</html>
