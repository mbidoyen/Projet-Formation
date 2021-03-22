<?php



include '../connexionBDD/connexion.php';

$query = $pdo->prepare

(
    'SELECT * FROM detailpanier WHERE id_panier = ?'
);

$query->execute([$_SESSION['panier']]);

$panier = $query->fetchAll();

?>