<?php

include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare

(
    'UPDATE clients SET password = ? WHERE email = ?'
);
$passwordMd5 = md5($_POST['password']);
$query->execute([$passwordMd5, $_POST['idclient']]);


$query = $pdo->prepare

(
    'DELETE FROM lost_password WHERE email = ?'
);

$query->execute([$_POST['idclient']]);

header('Location: ../Index/index.php');


?>
