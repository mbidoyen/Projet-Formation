<?php

include 'connexionBDD.php';

$today = date("Y-m-d H:i:s"); 

$query = $pdo->prepare
(
    'INSERT INTO blogueur (pseudo, email, password, date_inscription) values (?, ?, ?, ?)'
);

$passwordMd5 = md5($_POST['password']);
$query->execute([$_POST['pseudo'], $_POST['email'], $passwordMd5, $today]);

include 'index.phtml';
?>