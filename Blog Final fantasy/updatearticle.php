<?php

include 'connexionBDD.php';

$query = $pdo->prepare
(
    'UPDATE articles SET article = ?, titre = ?, categorie = ? WHERE id_article = ?'
);

$query->execute([$_POST['article'], $_POST['titre'], $_POST['categorie'], $_POST['idarticle']]);

include 'ressourceadministration.php';

?>