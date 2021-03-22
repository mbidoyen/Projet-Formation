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
        <h1 class="creationclient"><i class="fas fa-tools"></i>Panneau d'administration</h1>

        <fieldset>
        <legend><i class="fas fa-lock"></i> Historique des commandes</legend>

        <table id="customers">

            <tr>
                <th>Numéro de commande</th>
                <th>Numéro d'utilisateur</th>
                <th>Date de la commande</th>
                <th>Prix HT</th>
                <th>TVA (20%)</th>
                <th>Total</th>
            </tr>

        <?php

            $Commandes = ListeCommandes();

            foreach($Commandes as $commande){ ?>

                <tr>
                    <td><button id="<?= $commande['id_commande'] ?>" onclick="RecupererIdCommande(this);" ><?= $commande['id_commande'] ?></a></td>
                    <td><button id="<?= $commande['id_client'] ?>" onclick="RecupererIdClient(this);" ><?= $commande['id_client'] ?></a></td>
                    <td><?= $commande['date_commande'] ?></td>
                    <td><?= $commande['Prix_HT'] ?>€</td>
                    <td><?= $commande['tva'] ?>€</td>
                    <td><?= $commande['prix_total'] ?>€</td>
                </tr>

        <?php } ?>

        </table>
        </fieldset>

        <fieldset>
        <legend>Détails</legend>
            
            <section id="details"></section>

        </fieldset>
    </main>

    <script src="../../javascript/detailcommande.js"></script>
    </body>
    </html>