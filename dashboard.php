<?php
    // Config PHP
    session_start();

    // Check user IS NOT connected
    if (!isset($_SESSION['user'])) {
        // Redirection
        header('Location: connexion.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Connexion - Start Bootstrap Template</title>
        <!-- Link-->
        <?php include('template/link.php'); ?>
    </head>
    <body>
        <!-- Navigation-->
        <?php require('template/menu.php'); ?>

        <!-- Page content-->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto my-5 text-center">
                    <h1 class="text-center">
                        Hello <?= $_SESSION['user']['name'] ?>
                    </h1>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                    <p class="text-center">
                        <?= $_SESSION['error'] ?>
                    </p>
                    <?php $_SESSION['error'] = null; // On vide le message d'erreur ?>
                    <?php endif ?>

                    <hr>
                    <a class="btn btn-success" href="ajouter-article.php">
                        Créer un article
                    </a>
                    <a class="btn btn-primary" href="modifier-profile.php">
                        Modifier mon profil
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Footer-->
        <?php require('template/footer.php'); ?>

        <!-- Script -->
        <?php include('template/script.php'); ?>
    </body>
</html>