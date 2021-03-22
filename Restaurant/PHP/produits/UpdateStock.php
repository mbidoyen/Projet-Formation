<?php

include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare

(
    'SELECT stock FROM produits where id_produit = ?'
);

$query->execute([$_POST['idproduit']]);

$stock = $query->fetch();

$newstock = $stock['stock'] + $_POST['addstock'];

$query = $pdo->prepare

(
    'UPDATE produits SET stock = ? WHERE id_produit = ?'
);

$query->execute([$newstock, $_POST['idproduit']]);

header('Location: ajouter produit.php');

?>