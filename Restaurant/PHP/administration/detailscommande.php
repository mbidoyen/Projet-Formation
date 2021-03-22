<?php

include '../connexionBDD/connexionBDD.php';

$Idcommande = $_POST['IDcommande'];

$query = $pdo->prepare
(
    'SELECT * FROM `detailscommande` INNER JOIN produits ON detailscommande.id_produit = produits.id_produit WHERE id_commande = ?'
);

$query->execute([$Idcommande]);

$details = $query->fetchAll();

echo '<table id="customers">
    <tr>
        <th>Produits</th>
        <th>Quantité</th>
        <th>Prix Unitaire</th>
    </tr>
    ';
    foreach($details as $detail){ 

  echo '<tr>
        <td>'.$detail['nom'].'</td>
        <td>'.$detail['quantite'].'</td>
        <td>'.$detail['prix_vente'].'€</td>
    </tr>';

   }

?>