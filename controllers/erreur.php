<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Erreur - Extranet GMAE</title>
        <!-- Link-->
        <link rel="icon" type="image/png" href="assets/logo_GMAE.png"/>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../assets/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php require('../template/header.php'); ?>

        <!-- Page content-->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto my-5 text-center">
                    <h1 class="text-danger text-center">
                        Une erreur est survenue...
                    </h1>

                    <?php if (isset($_SESSION['error'])): ?>
                    <p class="text-danger text-center">
                        <?= $_SESSION['error'] ?>
                    </p>
                    <?php $_SESSION['error'] = null; // On vide le message d'erreur ?>
                    <?php endif ?>

                    <hr>
                    <a class="btn btn-outline-primary" href="javascript:history.back()">
                        Retour
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Footer-->
        <?php require('../template/footer.php'); ?>

        <!-- Script -->
        <?php include('../template/script.php'); ?>
    </body>
</html>
