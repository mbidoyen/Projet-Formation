<?php

include '../connexionBDD/connexionBDD.php';

if(isset($_FILES['photo'])){ 
    $dossier = '../../upload/';
    $fichier = basename($_FILES['photo']['name']);
    if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)) {
        $image = $dossier."".$fichier;
    }else{
        $image = $_POST['imageactuelle'];
    }
}

$query = $pdo->prepare
(
    'INSERT INTO produits (nom, description, photo, stock, prix_achat, prix_vente) values (?, ?, ?, ?, ?, ?)'
);

$query->execute([$_POST['nom'], $_POST['description'], $image, $_POST['stock'], $_POST['prixachat'], $_POST['prixvente']]);

header('Location: ajouter produit.php');
?>