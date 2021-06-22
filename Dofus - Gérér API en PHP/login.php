<?php

include 'connexionBDD.php';

$query = $pdo->prepare
(
    'SELECT * FROM users WHERE email = ? AND password = ?'
);
$passwordMd5 = md5($_POST['password']);
$query->execute([$_POST['email'], $passwordMd5]);

if($user = $query->fetch()){
    session_start();
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['pseudo'] = $user['pseudo'];

    header('Location: index.phtml');
}

else{
    header('Location: index.phtml?err=2');
}

?>