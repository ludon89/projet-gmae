<?php
session_start();

// Data
$idActeur = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$_SESSION["acteurs"]["id_acteur"] = $idActeur;
var_dump($_SESSION["acteurs"]["id_acteur"]);

// Connexion à la BDD
require('../models/connect-bdd.php');

// Requête & execution acteur
$sql = "SELECT * FROM acteurs WHERE id_acteur = '$idActeur'";
$req = $bdd->query($sql);
$acteur = $req->fetch(PDO::FETCH_ASSOC);

// Requête & exécution affichage commentaire
$sql = "
SELECT
    *
FROM
    posts
    INNER JOIN acteurs ON posts.id_acteur = acteurs.id_acteur
    INNER JOIN users ON posts.id_user = users.id_user
    AND acteurs.id_acteur = '$idActeur'
";
$req = $bdd->query($sql);
$comments = $req->fetchAll(PDO::FETCH_ASSOC);

// Requête & exécution affichage likes
$sql = "
SELECT
    *
FROM
    votes
    INNER JOIN acteurs ON votes.id_acteur = acteurs.id_acteur
    AND acteurs.id_acteur = '$idActeur'
    AND votes.vote = 1
";
$req = $bdd->query($sql);
$likes = $req->rowCount();

// Requête & exécution affichage dislikes
$sql = "
SELECT
    *
FROM
    votes
    INNER JOIN acteurs ON votes.id_acteur = acteurs.id_acteur
    AND acteurs.id_acteur = '$idActeur'
    AND votes.vote = 0
";
$req = $bdd->query($sql);
$dislikes = $req->rowCount();

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
    <section>
        <div class="container px-5 mt-5 mb-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="p-5"><img class="img-fluid rounded-start" style="object-fit : contain; height: 45vh; width : 45vw;" src="<?= $acteur['logo'] ?>" alt="logo entreprise"/></div>
                </div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4"><?= $acteur['acteur'] ?></h2>
                        <p><?= $acteur['description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comments section-->
    <section class="mb-5">
        <div class="card bg-light">
            <div class="card-body">
                <!-- Comment form-->
                <form class="mb-4">
                    <textarea class="form-control" rows="5" placeholder="Écrire un commentaire..."></textarea>
                    <button type="submit" class="btn btn-primary mt-3" style="border-radius : 2rem; font-size : 1.2rem;">Publier</button>
                </form>
                <hr>
                <!-- Affichage likes et commentaires-->
                <div class="d-flex">
                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                    <div class="ms-3">
                        Compteur de likes : <?= $likes ?>
                        Compteur de dislikes : <?= $dislikes ?>
                        <?php foreach ($comments as $comment) : ?>
                            <div class="fw-bold"><?= $comment["username"] ?></div>
                            <?= $comment["content"] ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Footer-->
<?php require('../template/footer.php'); ?>
    <!-- script -->
    <?php require('../template/script.php'); ?>
</body>

</html>