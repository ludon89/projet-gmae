<?php
    // Config PHP
    session_start();

    // Check user IS NOT connected
    // if (!isset($_SESSION['user'])) {
    //     // Redirection
    //     header('Location: connexion.php');
    //     exit();
    // }
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
        <?php require('template/link.php'); ?>
    </head>
    <body id="page-top">
        <!-- header-->
        <?php require('template/header.php'); ?>
        <div class="">
            <h1>Hello Id_user</h1>
        </div>
        <div class="">
            <p>Identifiant : <?= $_SESSION['user']['id'] ?>  </p>
            <p>Nom : <?= $_SESSION['user']['name'] ?></p>
            <p>Prenom : <?= $_SESSION['user']['prenom'] ?></p>
            <p>Adresse mail : <?= $_SESSION['user']['email'] ?></p>
        </div>
        <div>
        <button type="submit" class="btn btn-success">Modifier</button>
        <button type="submit" class="btn btn-success">Deconnexion</button>
        </div>
        <!-- Footer-->
        <?php require('template/footer.php'); ?>
        <!-- script -->
        <?php require('template/script.php'); ?>
    </body>
</html>