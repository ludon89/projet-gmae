<?php
    // Config PHP
    session_start();

    // // Check user IS connected
    // if (isset($_SESSION['user'])) {
    //     // Redirection
    //     header('Location: index.php');
    //     exit();
    // }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extranet GMAE</title>
    <!-- link -->
    <?php require('../template/link.php'); ?>
</head>
<body id="page-top">
    <!-- Navigation-->
    <?php require('../template/header.php'); ?>
        <!-- Page content-->
        <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto my-5">
                <h2 class="display-4">Connexion</h2>
                    <!-- Formulaire -->
                <form method="post" action="../controllers/login.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Identifiant</label>
                        <input type="username" name="username" class="form-control" id="exampleInputusername1" aria-describedby="usernameHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                    <a href="#!">Mot de passe oublié ?</a>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php require('../template/footer.php'); ?>
    <!-- script -->
    <?php require('../template/script.php'); ?>
</body>
</html>

