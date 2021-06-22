<?php

include 'connexionBDD.php';

$query = $pdo->prepare
(
    'SELECT * FROM users WHERE email = ?'
);

$query->execute([$_POST['email']]);

if($user = $query->fetch()){// S'il on retrouve l'email dans la base de données alors on indique a l'utilisateur qu'il a déjà un compte
    header('Location: index.phtml?err=1');  
}

else{// Sinon on lui crée un nouveau compte
    $query = $pdo->prepare
(
    'INSERT INTO users (email, password, pseudo) values (?, ?, ?)'
);

$passwordMd5 = md5($_POST['password']);
$query->execute([$_POST['email'], $passwordMd5, $_POST['pseudo']]);

header('Location: index.phtml?success=1');
}




?>
