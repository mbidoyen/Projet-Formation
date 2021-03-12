<?php

include 'connexionBDD.php';

$today = date("Y-m-d H:i:s"); 

$query = $pdo->prepare
(
    'INSERT INTO articles (id_blogueur, pseudo, article, date_article, categorie, titre) values (?, ?, ?, ?, ?, ?)'
);


$query->execute([$_POST['idblogueur'], $_POST['pseudo'], $_POST['article'], $today, $_POST['categorie'], $_POST['titre']]);

include 'ressourceadministration.php';
?>