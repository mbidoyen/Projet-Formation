<?php

include 'connexionBDD.php';

$query = $pdo->prepare
(
    'SELECT * FROM articles WHERE id_article = ?'
);

$query->execute([$_GET['id']]);

$article = $query->fetch();

include 'pageediter.phtml';


?>