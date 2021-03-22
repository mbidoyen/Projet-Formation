<?php

include '../connexionBDD/connexionBDD.php';

$Idclient = $_POST['IDclient'];

$query = $pdo->prepare
(
    'SELECT * FROM `clients` WHERE id_client = ?'
);

$query->execute([$Idclient]);

$details = $query->fetchAll();

echo '<table id="customers">
    <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Adresse</th>
       
    </tr>
    ';
    foreach($details as $detail){ 

  echo '<tr>
        <td>'.$detail['nom'].' '.$detail['prenom'].'</td>
        <td>'.$detail['email'].'</td>
        <td>Téléphone : '.$detail['Telephone'].'</td>
        <td>'.$detail['adresse'].'<p>'.$detail['code_postal'].', '.$detail['ville'].'</p><p>'.$detail['pays'].'</td>
        
    </tr>';

   }

?>