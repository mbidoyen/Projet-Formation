<?php

function UpdateAccount(){
    include '../connexionBDD/connexionBDD.php';

    $query = $pdo->prepare
        (
            'SELECT * FROM clients WHERE id_client = ?'
        );
        
        $query->execute([$_GET['idcompte']]);
        
        $client = $query->fetch();

        return $client;
}

function fetchUnClient(){

    session_start();
    
    include '../connexionBDD/connexionBDD.php';

     $query = $pdo->prepare
        (
            'SELECT * FROM clients WHERE id_client = ?'
        );
        
        $query->execute([$_SESSION['id_client']]);
        
        $client = $query->fetch();

        return $client;
}
       
function fetchAlladmin(){

    include '../connexionBDD/connexionBDD.php';

    $query = $pdo->prepare
        (
            'SELECT * FROM clients WHERE admin = 1'
        );
        
        $query->execute();
        
        $admin = $query->fetchAll();

        return $admin;
}

function FetchAllproducts(){
    
    include '../connexionBDD/connexionBDD.php';

    $query = $pdo->prepare
        (
            'SELECT * FROM produits'
        );
        
        $query->execute();
        
        $produits = $query->fetchAll();

        return $produits;
}

function FetchOneproduct(){
    
    include '../connexionBDD/connexionBDD.php';

    $query = $pdo->prepare
        (
            'SELECT * FROM produits'
        );
        
        $query->execute();
        
        $produit = $query->fetch();

        return $produit;
}

function Listepanier(){

include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare

(
    'SELECT *
    FROM detailpanier
    INNER JOIN produits ON detailpanier.id_produit = produits.id_produit WHERE id_panier = ?'
);

$query->execute([$_SESSION['panier']]);

$panier = $query->fetchAll();

return $panier;

}

function ListeCommandes(){
    
    include '../connexionBDD/connexionBDD.php';

    $query = $pdo->prepare
    (
        'SELECT * FROM commande'
    );

    $query->execute();

    $commandes = $query->fetchAll();

    return $commandes;
}

function ListeCommandeClient(){

    include '../connexionBDD/connexionBDD.php';

    $query = $pdo->prepare
    (
        'SELECT * FROM `commande` WHERE id_client = ?'
    );

    $query->execute([$_SESSION['id_client']]);

    $commandes = $query->fetchAll();

    return $commandes;
}

function ListeProduits(){

    include '../connexionBDD/connexionBDD.php';

    $query = $pdo->prepare
    (
        'SELECT * FROM produits'
    );

    $query->execute();

    $commandes = $query->fetchAll();

    return $commandes;

}

?>