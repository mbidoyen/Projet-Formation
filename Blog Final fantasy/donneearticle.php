<?php

include 'connexionBDD.php';

$query = $pdo->prepare
(
    'SELECT * FROM articles WHERE id_article = ?'
);

$query->execute([$_GET['id']]);

$articles = $query->fetch();

/*************Recupération commentaires******** */

$query = $pdo->prepare
(
    'SELECT * FROM commentaires WHERE id_article = ?'
);

$query->execute([$_GET['id']]);

$commentaire = $query->fetchAll();

include 'detail-article.phtml';
?>