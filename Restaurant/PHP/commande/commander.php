<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://kit.fontawesome.com/ec539eaecf.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../../CSS/normalize.css">
    <link rel="stylesheet" href="../../CSS/style.css">
    <title>Acceuil - Made In America !</title>
</head>

<body>
    <header>
        <section>
            <img src="../../image/afpa.png">
            <h1><a href="../Index/index.php">Restaurant - Made In America !</a></h1>
        </section>
    </header>

    <?php 
    include '../Utilities/utilities.php';

    $client = fetchUnClient();

    if(isset($_SESSION['id_client']) && $client['admin'] == null){ ?>
    <nav class="userbutton">
    <a href="../reservation/reserver.php">Réserver</a>
    <a href="../commande/commander.php">Commander</a>
    <p class="nomclient">Bonjour <a href="../Profil/ProfilClient.php?idclient=<?= $_SESSION['id_client'] ?>"><?= $client['prenom'] ?> <?= $client['nom'] ?> !</a></p>
    <a href="../connexion/deconnexion.php">Déconnexion</a>
    </nav>    
    <?php }

    else if(isset($_SESSION['id_client']) and $client['admin'] == 1){ ?>

        <section class="userbutton">
            <a href="../administration/panneau administration.php">Administration</a>
            <a href="../produits/ajouter produit.php">Meal</a>
            <a href="../admin/AjouterAdmin.php">Admin user</a>
            <a href="../reservation/reserver.php">Réserver</a>
            <a href="../commande/commander.php">Commander</a>
            <p>Bonjour <a href="../Profil/ProfilClient.php?idclient=<?= $_SESSION['id_client'] ?>"><?= $client['prenom'] ?> <?= $client['nom'] ?></a> !</p> 
            <a href="../connexion/deconnexion.php">Déconnexion</a>
        </section>

   <?php }
    
    
    else { ?>
        <section class="userbutton">
            <a href="../inscription/formulaire inscription.php">Créer un compte</a>
            <a href="../connexion/login.php">Connexion</a>
        </section>
    <?php } ?>

   <main>
        <h2 class="creationclient"><i class="fas fa-shopping-cart"></i>Passer une commande</h2>
        
        <form action="../Panier/Ajouterpanier.php" method="POST">
        <fieldset class="commande">
            <legend>Ajouter un article</legend>
        
            <article>
                <label for="Nom">Nom :</label>
                <select name="produits" id="produits">
                <option value="ChoisirProduit">Choisissez un produit</option>
                <?php

                $Produits = FetchAllproducts();

                foreach($Produits as $Produit){ ?>
                    <option value=" <?= $Produit['id_produit'] ?>"><?= $Produit['nom'] ?></option>
                <?php } ?>
                </select>
            </article>

            <div id="showarticles"></div>
        
            <article>
                <label for="quantité">Quantité:</label>
                <input type="number" class="quantite" name="quantite" min=0>
            </article>
                <input class="addproducts" type="submit" value="Ajouter">
            </section>
        </fieldset>
        </form>       

       

                <?php
                    if(isset($_SESSION['panier'])){ ?>

                    <fieldset>
                        <legend>Récapitulatif de la commande</legend>

                        <section id="Panier">
                           

                                <table id="customers">
                                    <tr>
                                        
                                        <th>Nom</th>
                                        <th>Quantité</th>
                                        <th>Prix unitaire</th>
                                        <th>Prix Total</th>
                                    </tr>
                                <?php

                                $paniers = Listepanier();
                          
                                foreach($paniers as $panier){ 
                                   
                                if($panier['quantite'] == $panier['stock'] ){?>
                                <tr>
                                <td class="photo"><img class="photosizepanier" class="imagepanier" src="<?= $panier['photo'] ?>"><?= $panier['nom'] ?> (Nous somme navrés, il ne nous reste que <?= $panier['stock'] ?> exemplaires de cet article)</td>
                                    <td><?= $panier['quantite']?></td>
                                    <td><?= $panier['prix'] ?>€</td>
                                    <td><?= $Prixtotal = number_format($panier['prix'] * $panier['quantite'], 2); ?>€</td>
                                    <td><a href="deletearticle.php?idproduit=<?= $panier['id_produit']?>"><i class="fas fa-times"></i></a>
                                           
                                </tr>
                                    <?php }else{ ?>

                                        <tr>
                                <td class="photo italic"><img class="photosizepanier" src="<?= $panier['photo'] ?>"><?= $panier['nom'] ?></td>
                                    <td><?= $panier['quantite'] ?></td>
                                    <td><?= $panier['prix'] ?>€</td>
                                    <td><?= $Prixtotal = number_format($panier['prix'] * $panier['quantite'], 2); ?>€</td>
                                    <td class="deletepanierproduits"><a title="Enlever le produit du panier" href="deletearticle.php?idproduit=<?= $panier['id_produit']?>"><i class="fas fa-times"></i></a>
                                           
                                </tr>
                                   

                                

                               <?php }  } ?>


                               <tr>
                               <td colspan="3" class="Prix"><strong>Total HT</strong></td>
                               <td ><strong>
                               <?php 
                                
                                include '../connexionBDD/connexionBDD.php';

                                $query = $pdo->prepare

                                (
                                    'SELECT SUM(quantite * prix) as prix_HT FROM `detailpanier` WHERE id_panier = ?'
                                );

                                $query->execute([$_SESSION['panier']]);

                                $panier = $query->fetch();?>
                                
                                <p><?= $panier['prix_HT']; ?>€</p>
                               
                               
                               </strong></td>
                               </tr>
                                
                                <tr>
                                <td colspan = "3" class="Prix"><strong >TVA (20%)</strong></td>
                                <td>
                                <?php

                                $montanttva = $panier['prix_HT'] * 0.20; 
                                $montanttva = number_format($montanttva, 2);?>
                                <p><strong><?= $montanttva ?>€</strong></p>

                                </td>
                                </tr>

                                <tr>
                                <td colspan = "3" class="Prix TCC">Prix TCC</td>
                                <td>
                                <?php

                                $PrixTCC = $montanttva + $panier['prix_HT'];
                                $PrixTCC = number_format($PrixTCC, 2);
                                ?>
                                <p class="TCC"><strong><?= $PrixTCC ?>€</strong></p>
                                </td>
                                
                                </tr>
                                </table>


                           
                        </section>
                    </fieldset>

                  <?php  }
                    
                    else { ?>
                    <fieldset>
                        <section id="Panier">
                           

                                <p>Votre panier est vide pour le moment</p>

                           
                        </section>
                    </fieldset>
                  <?php } ?>
 
            <button class="envoyer" onclick="window.location.href = 'validcommande.php'">Commander</button>
            <button class="annuler" onclick="window.location.href = 'annulcommande.php'">Annuler</button>
    </main>
    <script src="../../javascript/ajaxcommande.js"></script>
   </body>
   </html>