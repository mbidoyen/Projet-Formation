<?php

include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare
(
    'INSERT INTO clients (nom, prenom, birthday, adresse, ville, code_postal, pays, Telephone, email, password) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
);

$birthday = $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
$passwordMd5 = md5($_POST['password']);

$query->execute([$_POST['nom'], $_POST['prenom'], $birthday, $_POST['adresse'], $_POST['ville'], $_POST['CP'], $_POST['pays'], $_POST['telephone'], $_POST['email'], $passwordMd5]);

header('Location: ../Index/index.php') ;
?>