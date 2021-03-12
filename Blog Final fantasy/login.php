<?php
session_start();

include 'connexionBDD.php';

$query = $pdo->prepare
(
    'SELECT * FROM blogueur WHERE email = ? AND password = ?'
);

$passwordMd5 = md5($_POST['password']);
$query->execute([$_POST['email'], $passwordMd5]);

if($user = $query->fetch()){
    $_SESSION['id_blogueur'] = $user['id_blogueur'];
    header('Location: ressourceadministration.php');
}else{
    header('Location: index.phtml');
}

?>