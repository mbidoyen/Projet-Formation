<?php

include '../connexionBDD/connexionBDD.php';

session_start();

$query = $pdo->prepare
(
    'DELETE FROM detailpanier WHERE id_panier = ?'
    
);

$query->execute([$_SESSION['panier']]);

$query = $pdo->prepare
(
    'DELETE FROM panier WHERE id_panier = ?'
    
);

$query->execute([$_SESSION['panier']]);

unset($_SESSION['panier']);

header('Location: ../Index/index.php');
?>