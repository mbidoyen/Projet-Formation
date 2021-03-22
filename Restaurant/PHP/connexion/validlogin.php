<?php
session_start();

include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare
(
    'SELECT * FROM clients WHERE email = ? AND password = ?'
);

$passwordMd5 = md5($_POST['password']);
$query->execute([$_POST['email'], $passwordMd5]);

if($client = $query->fetch()){
    $_SESSION['id_client'] = $client['id_client'];
    header('Location: ../Index/index.php');
}else{
    header('Location: index.phtml');
}

?>