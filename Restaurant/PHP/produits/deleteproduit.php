<?php

include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare

(
    'DELETE FROM produits where id_produit = ?'
);

$query->execute([$_GET['idproduit']]);

header('Location: ajouter produit.php');
?>