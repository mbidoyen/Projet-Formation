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
    <a href="../commande/Commander.php">Commander</a>
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

        <section>

        <article>
            <fieldset class="detailscompte">
                <legend>Détails du compte</legend>
                <article>
                    <p><strong>Nom : </strong><?= $client['nom'] ?> <?= $client['prenom'] ?></p>
                    <p><strong>E-mail : </strong><?= $client['email'] ?></p>
                    <p><strong>Téléphone : </strong><?= $client['Telephone'] ?></p>
                </article>
                
                <article>
                <p><strong>Adresse :</strong></p>
                <p><?= $client['adresse'] ?></p>
                <p><?= $client['code_postal'] ?>, <?= $client['ville'] ?></p>
                <p><?= $client['pays'] ?></p>
                </article>
            </fieldset>

        </article>

        <article>
        <fieldset class="Afficherlescommandes">
            <legend>Dernière commandes</legend>
            <?php

            $ListeCommandeClient = ListeCommandeClient(); ?>
            <table id="detailcommandes">

                            <tr>
                                <th>Numéro de commande</th>
                                <th>Date de commande</th>
                                <th>Prix</th>
                                <th>Voir de détail</th>
                            </tr>

         <?php foreach($ListeCommandeClient as $CommClient){ ?>

                <tr>
                    <td><?= $CommClient['id_commande'] ?></td>
                    <td><?= $CommClient['date_commande'] ?></td>
                    <td><?= $CommClient['prix_total'] ?>€</td>
                    <td><button id="<?= $CommClient['id_commande'] ?>" onclick="RecupererIdCommandeProfil(this)">Voir le détail</button></td>
                </tr>
                
               



        <?php    } ?>
            </table>
           <table id="ShowOrderProfil"></table>
        </fieldset>
        </article>

        </section>

    </main>
    <script src="../../javascript/detailcommande.js"></script>
    </body>
    </html>