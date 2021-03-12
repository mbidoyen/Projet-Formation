<?php
include 'connexionBDD.php';

$query = $pdo->prepare
(
    'DELETE FROM articles WHERE id_article = ?'
);


$query->execute([$_GET['id']]);

include 'ressourceadministration.php';

?>