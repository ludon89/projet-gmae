<?php

session_start();

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
                <?php if (isset($_SESSION['error'])) : ?>
                    <p class="text-success text-center fw-bold">
                        <?= $_SESSION['error'] ?>
                    </p>
                    <?php $_SESSION['error'] = null; // On vide le message d'erreur
                    ?>
                <?php endif ?>
                <h2 class="display-4">Ajout d'un utilisateur</h2>
                <!-- Formulaire -->
                <form method="post" action="../traitement/src_adduser.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Identifiant</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
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
