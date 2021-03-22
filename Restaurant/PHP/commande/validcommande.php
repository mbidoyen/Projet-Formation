<?php

include '../connexionBDD/connexionBDD.php';

/**************AJOUT TABLE COMMANDE**********************/
session_start();

$query = $pdo->prepare

                                (
                                    'SELECT SUM(quantite * prix) as prix_HT FROM `detailpanier` WHERE id_panier = ?'
                                );

                                $query->execute([$_SESSION['panier']]);

                                $panier = $query->fetch();

                                $Prix_HT = $panier['prix_HT'];
                                
                                $Prix_TVA = $panier['prix_HT'] * 0.20; 

                                $prixTCC = $panier['prix_HT'] * 1.20;


$now = date("Y-m-d H:i:s");                                 

$query = $pdo->prepare
(
    'INSERT INTO commande (id_client, date_commande, Prix_HT, tva, prix_total) VALUE (?, ?, ?, ?, ?)'
);

$query->execute([$_SESSION['id_client'], $now, $Prix_HT, $Prix_TVA, $prixTCC]);

/**************Ajout du détail de la commande************ */

$query = $pdo->prepare

(
    'SELECT LAST_INSERT_ID(id_commande) FROM commande WHERE id_client = ? ORDER BY LAST_INSERT_ID(id_commande) DESC'
);

$query->execute([$_SESSION['id_client']]);

$commande = $query->fetch();

$IDcommande = $commande['LAST_INSERT_ID(id_commande)'];

$query = $pdo->prepare

(
    'SELECT * FROM detailpanier WHERE id_panier = ?'
);

$query->execute([$_SESSION['panier']]);

$Panier = $query->fetchAll();


foreach($Panier as $panier){

    $query = $pdo->prepare

(
    'INSERT INTO detailscommande (id_commande, id_client, id_produit, quantite, prix_unitaire) VALUES(?, ?, ?, ?, ?)'
);

$query->execute([$IDcommande, $_SESSION['id_client'], $panier['id_produit'], $panier['quantite'], $panier['prix']]);
}

/**************************GERER LES STOCKS***************************************** */

$query = $pdo->prepare

(
    'SELECT *
    FROM detailpanier
    INNER JOIN produits ON detailpanier.id_produit = produits.id_produit WHERE id_panier = ?'
);

$query->execute([$_SESSION['panier']]);

$GererQuantite = $query->fetchAll();



foreach($GererQuantite as $quantite){

    if($quantite['stock'] <= 0 && ($quantite['stock'] - $quantite['quantite']) < 0){
        
    }else{
        $calculstock = $quantite['stock'] - $quantite['quantite'];

    $query = $pdo->prepare

(
    'UPDATE produits SET stock = ? WHERE id_produit = ?'
);

$query->execute([ $calculstock, $quantite['id_produit']]);

}
    }







/******************************SUPRESSION DU PANIER************************************ */

$query = $pdo->prepare
(
    'DELETE FROM detailpanier WHERE id_panier = ?'
    
);

$query->execute([$_SESSION['panier']]);

$query = $pdo->prepare
(
    'DELETE FROM panier WHERE id_panier = ?'
    
);

$query->execute([$_SESSION['panier']]);



unset($_SESSION['panier']);

header('Location: achateffectue.php');
?>