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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    
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

    <main>

        <h2 class="creationclient"><i class="fas fa-user"></i>Création d'un compte client</h2>

        <form id="forminscription" action="validinscription.php" method="POST">

        <fieldset class="identite">
            <legend><i class="fas fa-address-book"></i> Identité et coordonnées</legend>
<article>
            <label for="nom">Nom :</label>
            <input name="nom" type="text">
</article>
<article>
            <label for="prenom">Prénom :</label>
            <input name="prenom" type="text">
</article>
<article>
            <label for="birthday">Date de naissance :</label>
            <select id="jour" name="jour">
                                <?php for($day = 1; $day <= 31; $day++): ?>
                                    <option value="<?= $day ?>"><?= $day ?></option>
                                <?php endfor ?>
                            </select>
                            <span>/</span>
                            <select name="mois">
                                <option value="1">Janvier</option>
                                <option value="2">Février</option>
                                <option value="3">Mars</option>
                                <option value="4">Avril</option>
                                <option value="5">Mai</option>
                                <option value="6">Juin</option>
                                <option value="7">Juillet</option>
                                <option value="8">Août</option>
                                <option value="9">Septembre</option>
                                <option value="10">Octobre</option>
                                <option value="11">Novembre</option>
                                <option value="12">Décembre</option>
                            </select>
                            <span>/</span>
                            <select name="annee">
                                <?php for($year = 1900; $year < date('Y') + 1; $year++): ?>
                                    
                                    <?php if($year == 2021){?>
                                        <option value="<?= $year ?>" selected="selected"><?= $year ?></option>
                                   <?php } else { ?>
                                       <option value="<?= $year ?>"><?= $year ?></option>
                                      <?php } ?>
                                <?php endfor ?>
            </select>
        </article> 

        <article>
            <label for="adresse">Adresse :</label>
            <textarea name='adresse'></textarea>
        </article>

        <article> 
            <label for="ville">Ville :</label>
            <input type='text' name="ville">
        </article>

        <article>
            <label for="codepostal">Code Postal :</label>
            <input type="text" name="CP">
        </article>

        <article>
            <label for="pays">Pays :</label>
            <input type="text" name="pays">
        </article>

        <article>
            <label for="telephone">Téléphone :</label>
            <input type="tel" name="telephone" pattern="[0-9]{10}">
        </article> 

        </fieldset>

        <fieldset class="authentification">

            <legend><i class="fas fa-lock"></i> Information d'authentification</legend>
        
        <article>
            <label for="email">E-mail :</label>
            <input type="email" name="email">
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