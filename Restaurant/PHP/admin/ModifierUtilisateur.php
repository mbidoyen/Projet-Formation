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
    
    <h2 class="creationclient"><i class="fas fa-user"></i>Modifier un compte</h2>

    <form id="forminscription" action="UpdateAccount.php" method="POST">

        <fieldset class="identite">
            <legend><i class="fas fa-address-book"></i> Identité et coordonnées</legend>

           <?php $Update = UpdateAccount(); ?>

        <input type="hidden" name="idclient" value="<?= $Update['id_client'] ?>">

<article>
            <label for="nom">Nom :</label>
            <input name="nom" type="text" value="<?= $Update['nom'] ?>">
</article>
<article>
            <label for="prenom">Prénom :</label>
            <input name="prenom" type="text" value="<?= $Update['prenom'] ?>">
</article>
<article>
    <?php
 $date = $Update['birthday'];
 echo $date;
 list($annee, $mois, $jour) = explode("-", $date);
 echo "Mois : $mois; Jour : $jour; Année : $annee<br />";
    ?>
            <label for="birthday">Date de naissance :</label>
            <select id="jour" name="jour">
                                <?php 
                                
                               
                                
                                for($day = 1; $day <= 31; $day++): 
                                
                                     if($day == $jour){ ?>
                                        <option value="<?= $day ?>" selected><?= $day ?></option>
                                    <?php }else{ ?>
                                         <option value="<?= $day ?>"><?= $day ?></option>
                                                                
                                <?php } endfor ?>
                            </select>
                            <span>/</span>
                            <select name="mois">
                                
                                <option value="1" <?php if($mois == 1){echo 'selected = "selected"';} ?>>Janvier</option>
                                <option value="2" <?php if($mois == 2){echo 'selected = "selected"';} ?>>Février</option>
                                <option value="3" <?php if($mois == 3){echo 'selected = "selected"';} ?>>Mars</option>
                                <option value="4" <?php if($mois == 4){echo 'selected = "selected"';} ?>>Avril</option>
                                <option value="5" <?php if($mois == 5){echo 'selected = "selected"';} ?>>Mai</option>
                                <option value="6" <?php if($mois == 6){echo 'selected = "selected"';} ?>>Juin</option>
                                <option value="7" <?php if($mois == 7){echo 'selected = "selected"';} ?>>Juillet</option>
                                <option value="8" <?php if($mois == 8){echo 'selected = "selected"';} ?>>Août</option>
                                <option value="9" <?php if($mois == 9){echo 'selected = "selected"';} ?>>Septembre</option>
                                <option value="10" <?php if($mois == 10){echo 'selected = "selected"';} ?>>Octobre</option>
                                <option value="11" <?php if($mois == 11){echo 'selected = "selected"';} ?>>Novembre</option>
                                <option value="12" <?php if($mois == 12){echo 'selected = "selected"';} ?>>Décembre</option>
                            </select>
                            <span>/</span>
                            <select name="annee">
                                <?php for($year = 1900; $year < date('Y') + 1; $year++): ?>
                                    
                                    <?php if($year == $annee){?>
                                        <option value="<?= $year ?>" selected="selected"><?= $year ?></option>
                                   <?php } else { ?>
                                       <option value="<?= $year ?>"><?= $year ?></option>
                                      <?php } ?>
                                <?php endfor ?>
            </select>
        </article> 

        <article>
            <label for="adresse">Adresse :</label>
            <textarea name='adresse'><?= $Update['adresse'] ?></textarea>
        </article>

        <article> 
            <label for="ville">Ville :</label>
            <input type='text' name="ville" value="<?= $Update['ville'] ?>">
        </article>

        <article>
            <label for="codepostal">Code Postal :</label>
            <input type="text" name="CP" value="<?= $Update['code_postal'] ?>">
        </article>

        <article>
            <label for="pays">Pays :</label>
            <input type="text" name="pays" value="<?= $Update['pays'] ?>">
        </article>

        <article>
            <label for="telephone">Téléphone :</label>
            <input type="tel" name="telephone" pattern="[0-9]{10}" value="<?= $Update['Telephone'] ?>">
        </article> 

        </fieldset>

        <fieldset class="authentification">

            <legend><i class="fas fa-lock"></i> Information d'authentification</legend>
        
        <article>
            <label for="email">E-mail :</label>
            <input type="email" name="email" value="<?= $Update['email'] ?>">
        </article>

        <article>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password">
        </article>

        </fieldset>

    <section class="validinscription">
        <input class="envoyer" type="submit" value="S'incrire">
        <a class="annuler" href="../Index/index.php">Annuler</a>
    </section>

        </form>
    </main>
    </body>
    </html>