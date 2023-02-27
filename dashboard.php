<?php
    // Config PHP
    session_start();
    require('model/connect-bdd.php');
    $id = "SELECT `username` FROM `users` WHERE `username`";
    $firstname = "SELECT `nom` FROM `users` WHERE `nom`";
    $lastname = "SELECT `prenom` FROM `users` WHERE `prenom`";
    $email = "SELECT `email` FROM `users` WHERE `email`";
    



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
                        <h1>Hello <?= $id ?>  </h1>
                    </div>
                    <div class="">
                        <p>Identifiant : <?= $id ?>  </p>
                        <p>Nom : <?= $firstname ?></p>
                        <p>Prenom : <?= $lastname?></p>
                        <p>Adresse mail : <?= $email  ?></p>
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