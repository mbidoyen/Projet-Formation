<?php

include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare

(
    'SELECT * FROM client WHERE email = ?'
);

$query->execute([$_GET['id']]);

if($client = $query->fetch()){
    
}else{
    echo 'Email inconnu';
}

?>