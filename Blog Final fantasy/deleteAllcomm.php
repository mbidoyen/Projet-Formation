<?php
include 'connexionBDD.php';

$query = $pdo->prepare
(
    'DELETE FROM commentaires WHERE id_article = ?'
);

$query->execute([$_GET['idart']]);

/*******************RECUP ARTICLE***************** */

$query = $pdo->prepare
(
    'SELECT * FROM articles WHERE id_article = ?'
);

$query->execute([$_GET['idart']]);

$articles = $query->fetch();

/*************Recupération commentaires******** */

$query = $pdo->prepare
(
    'SELECT * FROM commentaires WHERE id_article = ?'
);

$query->execute([$_GET['idart']]);

$commentaire = $query->fetchAll();

header("location: donneearticle.php?id=".$articles['id_article']."");

?>