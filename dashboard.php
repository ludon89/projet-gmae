<?php
    // Config PHP
    session_start();
    var_dump($_SESSION);
    require('model/connect-bdd.php');

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
        <?php require('template/header2.php'); ?>
        <div class="container">
            <div class="raw">
                <div class="col-lg-6 mx-auto my-5">
                    <div class="">
                        <h1>Hello <?= $_SESSION['users']['username'] ?>  </h1>
                    </div>
                    <div class="">
                        <p>Identifiant : <?= $_SESSION['users']['username'] ?>  </p>
                        <p>Nom : <?= $_SESSION['users']['nom'] ?></p>
                        <p>Prenom : <?= $_SESSION['users']['prenom'] ?></p>
                        <p>Adresse mail : <?= $_SESSION['users']['email'] ?></p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"> 
                            <a class="lien" href="modified.php">Modifier</a> 
                        </button>
                        <button type="submit" class="btn btn-success">Deconnexion</button>
                    </div>
                </div>
            </div>

        </div>
        
        <!-- Footer-->
        <?php require('template/footer.php'); ?>
        <!-- script -->
        <?php require('template/script.php'); ?>
    </body>
</html>