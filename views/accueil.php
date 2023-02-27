<?php

session_start();

// Connexion à la BDD
require('../models/connect-bdd.php');

// Requête & execution
$sql = "SELECT * FROM acteurs";
$req = $bdd->query($sql);

// Lire le résultat de la requête
$acteurs = $req->fetchAll(PDO::FETCH_ASSOC);

// var_dump($acteurs);

?>

<!DOCTYPE html>
<html lang="en">
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
        <!-- Navigation-->
        <?php require('../template/header.php'); ?>
        <section id="scroll">
            <div class="container px-5">
                <!-- Acteurs/Partenaires -->
                <?php
                foreach ($acteurs as $acteur) {
                    require('../components/accueil_partenaire.php');
                }
                ?>
            </div>
        </section>
        <!-- Footer-->
        <?php require('../template/footer.php'); ?>
        <!-- script -->
        <?php require('../template/script.php'); ?>
    </body>
</html>
