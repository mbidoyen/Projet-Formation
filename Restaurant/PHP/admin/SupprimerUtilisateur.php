<?php

include '../connexionBDD/connexionBDD.php';

$idclient = $_GET['idcompte'];

$query =$pdo->prepare

(
    'DELETE FROM clients WHERE id_client = ?'
);

$query->execute([$idclient]);

header('Location: AjouterAdmin.php');

?>