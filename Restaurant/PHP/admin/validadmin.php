<?php
include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare
        (
            'UPDATE clients SET admin = "1" WHERE email = ? AND password = ?'
        );
        
$passwordMd5 = md5($_POST['password']);
$query->execute([$_POST['email'], $passwordMd5]);

header('Location: AjouterAdmin.php');
?>