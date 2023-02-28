<?php

session_start();
ob_start();

require('../models/connect-bdd.php');
// Préparation de la requête SQL de sélection
    $sql = "SELECT * FROM users
        WHERE username = :username";
    $req = $bdd->prepare($sql);
 
    $req->execute(array(
        'username' => $_SESSION['username']
    ));
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
       <?php require('../template/header.php');?>
       <?php while($res = $req->fetch(PDO::FETCH_ASSOC)) { ?>
        <div>
            <div class="userh">
                <h1>Hello <?= $res['username'] ?></h1>
            </div>
            <div class="userh">
                <p><span class="pdashboard">Identifiant :</span><?= $res['username'] ?> </p>
                <p><span class="pdashboard">Nom :</span><?= $res['nom'] ?> </p>
                <p><span class="pdashboard">Prenom :</span><?= $res['prenom'] ?> </p>
                <p><span class="pdashboard">Adresse mail :</span><?= $res['email'] ?> </p>
            </div>
            <div class="user-btnh">
                <button type="submit" class="success" style=" border : none;">Modifier</button>
                
            </div>
        <?php } ?>

            <!-- Footer-->
        <!-- Footer-->
        <?php require('../template/footer.php'); ?>
        <!-- script -->
        <?php require('../template/script.php'); ?>
    </body>
</html>
