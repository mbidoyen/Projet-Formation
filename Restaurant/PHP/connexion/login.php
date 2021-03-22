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

    <section class="userbutton">
    <a href="../inscription/formulaire inscription.php">Créer un compte</a>
</section>
    <main>

    <h2 class="creationclient"><i class="fas fa-lock"></i>Se connecter avec un compte utilisateur</h2>

    <form action="validlogin.php" method="POST">

        <fieldset class="login">

            <legend>Information d'authentification</legend>

            <label for="email">E-mail :</label>
            <input type="email" name="email">

            <label for="password">Mot de passe :</label>
            <input type="password" name="password">

        </fieldset>

    <section class="validinscription">
        <input class="envoyer" type="submit" value="Connexion">
        <a class="annuler" href="../Index/index.php">Annuler</a>
    </section>

    </form>
    </main>
</body>
</html>