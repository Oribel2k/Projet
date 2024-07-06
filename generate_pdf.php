<?php
header ("Content-type:text/html; charset=utf-8");
// 1. Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=bp', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}

// 2. Récupération des données
$stmt1 = $pdo->query("SELECT * FROM candidat");
$data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $pdo->query("SELECT * FROM formations");
$data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$stmt3 = $pdo->query("SELECT * FROM experiences");
$data3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

$stmt4 = $pdo->query("SELECT * FROM competences");
$data4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

// 3. Utilisation d'une bibliothèque PDF (FPDF dans cet exemple)
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

// 4. Insertion des données dans le PDF
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Etat civil', 0, 1);

foreach ($data1 as $row) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nom: ' . $row['nom'], 0, 1);
    $pdf->Cell(0, 10, 'Prenom: ' . $row['prenom'], 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . $row['email'], 0, 1);
    $pdf->Cell(0, 10, 'Telephone: ' . $row['telephone'], 0, 1);
    $pdf->Cell(0, 10, 'Sexe: ' . $row['sexe'], 0, 1);
    $pdf->Cell(0, 10, 'Date de naissance: ' . $row['date_naissance'], 0, 1);
    $pdf->Cell(0, 10, 'Departement: ' . $row['departement'], 0, 1);
    $pdf->Cell(0, 10, 'Commune: ' . $row['commune'], 0, 1);
    $pdf->Cell(0, 10, 'Quartier: ' . $row['quartier'], 0, 1);
    $pdf->Cell(0, 10, 'Situation matrimoniale: ' . $row['situation'], 0, 1);
    $pdf->Ln();
}


$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Formations et diplomes', 0, 1);

foreach ($data2 as $row) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Type de formation: ' . $row['type_formation'], 0, 1);
    $pdf->Cell(0, 10, 'Ecole de formation: ' . $row['ecole_institut'], 0, 1);
    $pdf->Cell(0, 10, 'Niveau etude: ' . $row['niveau_etude'], 0, 1);
    $pdf->Ln();
}


$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Experiences', 0, 1);

foreach ($data3 as $row) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Structure: ' . $row['structure'], 0, 1);
    $pdf->Cell(0, 10, 'Intitule du poste: ' . $row['intitule_poste'], 0, 1);
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Competences', 0, 1);

foreach ($data4 as $row) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Type: ' . $row['type'], 0, 1);
    $pdf->Cell(0, 10, 'Niveau: ' . $row['niveau'], 0, 1);
    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Motivations', 0, 1);

foreach ($data1 as $row) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Motivation: ' . $row['motivation'], 0, 1);
    $pdf->Ln();
}
// 5. Sauvegarde ou affichage du PDF
$pdf->Output(); // Affichage dans le navigateur

// Décommenter cette ligne pour sauvegarder le fichier au lieu de l'afficher
// $pdf->Output('F', 'formulaires.pdf'); // Sauvegarde dans un fichier
?>
