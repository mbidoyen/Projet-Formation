<?php

include '../connexionBDD/connexionBDD.php';

session_start();

$query = $pdo->prepare
(
    'DELETE FROM detailpanier WHERE id_produit = ?'
);

$query->execute([$_GET['idproduit']]);

$query = $pdo->prepare
(
    'SELECT * FROM detailpanier WHERE id_panier = ?'
);

$query->execute([$_SESSION['panier']]);

$vide = $query->fetch();

if(!empty($vide)){

}else{

    $query = $pdo->prepare
(
    'DELETE FROM panier WHERE id_panier = ?'
);

$query->execute([$_SESSION['panier']]);

    unset($_SESSION['panier']);
}



header('Location: commander.php');
?>