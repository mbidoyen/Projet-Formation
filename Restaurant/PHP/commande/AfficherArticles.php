<?php
    
    include '../connexionBDD/connexionBDD.php';

    $Article = $_POST['Article'];

    $query = $pdo->prepare
        (
            'SELECT * FROM produits WHERE id_produit = ?'
        );
        
        $query->execute([$Article]);
        
        $Products = $query->fetch();

        echo '
        
        <fieldset class="detailsproduit">
        
        <img class="imagecommande" src="'.$Products['photo'].'">

        <article class="description-produits">
        <p>'.$Products['description'].'</p>

        <p>Prix : <strong>'.$Products['prix_vente'].'</strong></p>
        </article>
        </fieldset>';

?>



