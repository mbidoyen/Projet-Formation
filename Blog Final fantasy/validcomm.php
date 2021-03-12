<?php

include 'connexionBDD.php';

$test = $_POST['idarticle'];

$today = date("Y-m-d H:i:s"); 

$query = $pdo->prepare
(
    'INSERT INTO commentaires (id_article, pseudo, commentaire, date_commentaire) values (?, ?, ?, ?)'
);

$query->execute([$test, $_POST['pseudo'], $_POST['commentaire'], $today]);

$query = $pdo->prepare
(
    'SELECT * FROM articles WHERE id_article = ?'
);

$query->execute([$test]);

$articles = $query->fetch();

/*************Recupération commentaires******** */

$query = $pdo->prepare
(
    'SELECT * FROM commentaires WHERE id_article = ?'
);

$query->execute([$test]);

$commentaire = $query->fetchAll();

header("location: donneearticle.php?id=".$articles['id_article']."");
?>