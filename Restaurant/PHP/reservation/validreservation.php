<?php
session_start();
include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare
(
    'INSERT INTO reservation (date, nombrecouverts, id_clients) VALUE (?, ?, ?)'
);

$query->execute([$_POST['date'], $_POST['nbrpersonne'], $_SESSION['id_client']]);

header('Location: ../../index.php');
?>