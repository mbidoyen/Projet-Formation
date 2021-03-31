<?php

include '../connexionBDD/connexionBDD.php';

$query = $pdo->prepare

(
    'SELECT * FROM lost_password WHERE token = ?'
);

$passwordMd5 = md5($_GET['token']);
$query->execute([$passwordMd5]);

if($client = $query->fetch()){ ?>

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

    <main>

    <h2 class="creationclient"><i class="fas fa-lock"></i>Demande de changement de mot de passe</h2>

    <form action="validupdatepassword.php" method="POST">

        <fieldset class="login">

            <legend>Modification de votre mot de passe</legend>

            <input type="hidden" name="idclient" value="<?= $client['email'] ?>">

            <label for="password">Entrez votre nouveau mot de passe :</label>
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

<?php

}
else{
    echo 'Un problème est survenu, merci de contacter l\'administrateur du site';
}


?>
