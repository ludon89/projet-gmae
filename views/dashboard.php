<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Extranet GMAE</title>
        <!-- link -->
        <?php require('../template/link.php'); ?>
    </head>
    <body id="page-top">
        <!-- header-->
        <?php require('../template/header.php'); ?>
        <div class="">
            <h1>Hello Id_user</h1>
        </div>
        <div class="">
            <p>Identifiant : </p>
            <p>Nom : </p>
            <p>Prenom : </p>
            <p>Adresse mail : </p>
        </div>
        <div>
        <button type="submit" class="btn btn-success">Modifier</button>
        <button type="submit" class="btn btn-success">Deconnexion</button>
        </div>
        <!-- Footer-->
        <?php require('../template/footer.php'); ?>
        <!-- script -->
        <?php require('../template/script.php'); ?>
    </body>
</html>
