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

        <h2 class="creationclient"><i class="fas fa-utensils"></i>Réservation d'une table</h2>

        <form action="validreservation.php" method="POST">
            <fieldset class="login">
                <legend>Informations</legend>

                <label for="date">Date de réservation :</label>
                <input type="datetime-local" name="date">

                <label for="nbrpersonne">Nombre de personnes :</label>
                <input type="number" name="nbrpersonne" min=0 >
            </fieldset>

            <section class="sectioncentrer">
                <input class="envoyer" type="submit" value="Réserver">
                <a class="annuler" href="../Index/index.php">Annuler</a>
            </section>
        </form>
   </main>
   </body>
   </html>