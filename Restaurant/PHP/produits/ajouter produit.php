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
    <a href="../Reservation/Reservation.php">Réserver</a>
    <a href="../Commander/Commander.php">Commander</a>
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
        <h2 class="creationclient"><i class="fas fa-cheese"></i>Ajout d'un produit au catalogue</h2>

        <form action="validproduitajout.php" method="POST" enctype="multipart/form-data">

            <fieldset class="identite">
                <legend><i class="fas fa-check"></i>Caractéristiques</legend>
            
                <article>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom">
    </article>

    <article>
                <label for="description">Description :</label>
                <textarea name="description"></textarea>
    </article>

    <article>
                <label for="photo">Photo :</label>
                <input type="file" name="photo" id="photo">

                <small><i class="fas fa-exclamation-triangle"></i> Merci de renommer le fichier de la photo avec le nom de l'aliment avant de l'envoyer</small>
    </article>            
            </fieldset>

            <fieldset class="identite">
                <legend><i class="fas fa-sync-alt"></i>Approvisionnement</legend>
        <article>
    
                <label for="Stock">Stock initial :</label>
                <input type="text" name="stock">
            </article>
        <article>
    
                <label for="prixachat">Prix d'achat :</label>
                <input type="text" name="prixachat">
            </article>
        <article>
    
                <label for="prixvente">Prix de vente :</label>
                <input type="text" name="prixvente">
        </article>
            </fieldset>

            <input class="envoyer" type="submit" value="Ajouter">
            <a class="annuler" href="../Index/index.php">Annuler</a>
        </form>

        <table id="customers" class="meal">

        <tr>
            <th>Nom du Produit</th>
            <th>Description du produit</th>
            <th>Stock</th>
            <th>Prix d'achat</th>
            <th>Prix de vente</th>
            <th>ajouter dans le stock</th>
            
        </tr>
        <?php 

        $listeproduits = ListeProduits();

        foreach($listeproduits as $listeproduit){ ?>

        <tr>
            <td class="photo"><img class="photosize" src="<?= $listeproduit['photo'] ?>"> <p><?= $listeproduit['nom'] ?></p></td>
            <td><?= $listeproduit['description'] ?></td>
            <td><?= $listeproduit['stock'] ?></td>
            <td><?= $listeproduit['prix_achat'] ?></td>
            <td><?= $listeproduit['prix_vente'] ?></td>
            <td><form class="stock" method="POST" action="UpdateStock.php">
                <input type="hidden" name="idproduit" value="<?= $listeproduit['id_produit'] ?>">
                <input type="number" name="addstock">
                <input type="submit" id="addstock" value="+">
            </form>
            </td>
            <td><a title="Modifier un article" href="modifierunproduit.php?idproduit= <?= $listeproduit['id_produit'] ?>"><i class='fas fa-pen'></i></a></td>
        </tr>

      <?php  } ?>
        </table>
    </main>