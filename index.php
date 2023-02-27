<?php

session_start();
var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Extranet GMAE</title>
    <link rel="icon" type="image/png" href="assets/img/logo_GMAE.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- header-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="logo">
            <img src="assets/img/logo_GMAE.png" width=100px alt="">
            <p>GMAE</p>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="views/about.php">Qui sommes-nous?</a></li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item"><a class="nav-link" href="views/accueil.php">Partenaires</a></li>
                    <li class="nav-item"><a class="nav-link" href="views/dashboard.php"><i class="fa-solid fa-user"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="views/controllers/logout.php"><i class="fa-solid fa-power-off"></i></a></li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link" href="views/connexion.php"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>    <!-- containt-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Bienvenue au GMAE</h1>

                <h2 class="masthead-subheading mb-0">Trouvez la meilleure prestation !</h2>
                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="views/connexion.php">Connexion</a>
            </div>
        </div>
    </header>
    <!-- Footer-->
    <?php require('template/footer.php'); ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/scripts.js"></script>
</body>

</html>