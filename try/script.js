// script.js
function valider() {
    const nom = document.getElementById('nom').value;
    const prenom = document.getElementById('prenom').value;
    const age = document.getElementById('age').value;

    const resultatDiv = document.getElementById('resultat');
    resultatDiv.innerHTML = `<p><strong>Nom:</strong> ${nom}</p>
                             <p><strong>Prénom:</strong> ${prenom}</p>
                             <p><strong>Age:</strong> ${age}</p>`;
    resultatDiv.style.display = 'block';
}
