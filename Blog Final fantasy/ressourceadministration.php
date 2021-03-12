<?php
session_start();

if(!isset($_SESSION['id_blogueur'])){
    header('Location: index.phtml');
}

include 'connexionBDD.php';

$query = $pdo->prepare
(
    'SELECT * FROM blogueur where id_blogueur = ?'
);
$query->execute([$_SESSION['id_blogueur']]);
$user = $query->fetch();

/***********RECUPERATION ARTICLE**********************/
$query = $pdo->prepare
(
    'SELECT * FROM articles ORDER BY date_article DESC'
);

$query->execute();

$articles = $query->fetchAll();

include 'administration.phtml';


?>