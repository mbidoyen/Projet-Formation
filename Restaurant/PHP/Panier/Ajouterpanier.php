<?php

include '../connexionBDD/connexionBDD.php';

session_start();
/*************************************RECUPERATION INFORMATION PRODUITS*************************/
$query = $pdo->prepare
        (
            'SELECT * FROM produits WHERE id_produit = ?'
        );
        
        $query->execute([$_POST['produits']]);
        
        $Products = $query->fetch();

/******************************************************************************************** */
/******************************AJOUT ARTICLE DANS LE PANIER********************************* */
/****************************************************************************************** */

/************VERIFICATION DES STOCKS EN FONCTION DE LA QUANTITE DEMANDEE****************** */
if(isset($_SESSION['panier'])){

$quantite = $_POST['quantite'];

$annulquantite = $Products['stock'] - $_POST['quantite'];

    if($Products['stock'] == 0 || $annulquantite < 0){
        $quantite = $Products['stock'];
    }else{
        $quantite = $_POST['quantite'];
    }

/***********************RECHERCHE PRODUIT POUR UPDATE LA QUANTITE********************************** */
$query = $pdo->prepare

(
    'SELECT * FROM detailpanier WHERE id_produit = ?'
);

$query->execute([$_POST['produits']]);

/**********************************MODIFICATION DE QUANTITE**********************************************************/

if($produit = $query->fetch()){
   $updatequantite = $produit['quantite'] + $quantite;

   $query = $pdo->prepare
   (
       'UPDATE detailpanier SET quantite = ?'
   );

   $query->execute([$updatequantite]);

   /******************************SI ARTICLE PAS DANS LE PANIER ALORS ON AJOUTE *********************/
}else{
    
    $query = $pdo->prepare

(
    'INSERT INTO detailpanier (id_panier, id_client, id_produit, nom, quantite, prix) VALUES (?, ?, ?, ?, ?, ?)'
);

$query->execute([$_SESSION['panier'],$_SESSION['id_client'], $_POST['produits'], $Products['nom'], $quantite, $Products['prix_vente']]);

}

header('Location: ../commande/commander.php');

/*************************************************************************************************/
/********************SI LE PANIER N'EXISTE PAS ALORS ON EN CREE UN****************************** */
/*********************************************************************************************** */
}else{

    $query = $pdo->prepare
        (
            'INSERT INTO panier (id_client, id_produit) VALUES (?, ?)'
        );
        
        $query->execute([$_SESSION['id_client'], $_POST['produits']]);

    $query = $pdo->prepare
    (
        'SELECT * FROM panier WHERE id_client = ?'
    );

    $query->execute([$_SESSION['id_client']]);

    $panier = $query->fetch();
    $_SESSION['panier'] = $panier['id_panier'];

/************************************AJOUT DE L'ARTICLE DE LE PANIER TOUT JUSTE CREE*********************************************************** */
    $quantite = $_POST['quantite'];

    $annulquantite = $Products['stock'] - $_POST['quantite'];

    if($Products['stock'] == 0 || $annulquantite < 0){
        $quantite = $Products['stock'];
    }else{
        $quantite = $_POST['quantite'];
    }

    $query = $pdo->prepare
    (
        'INSERT INTO detailpanier (id_panier, id_client, id_produit, nom, quantite, prix) VALUES (?, ?, ?, ?, ?, ?)'
    );
    
    $query->execute([$_SESSION['panier'],$_SESSION['id_client'], $_POST['produits'], $Products['nom'], $quantite, $Products['prix_vente']]);

   

    header('Location: ../commande/commander.php');
}


?>