<nav class="navbar navbar-expand-lg  navbar-custom">
    <div class="container px-5">
        <img src="../assets/img/logo_GMAE.png" width=100px alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">Qui sommes-nous?</a></li>
                <?php if (isset($_SESSION['user'])) : ?>
                    <li class="nav-item"><a class="nav-link" href="accueil.php">Partenaires</a></li>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fa-solid fa-user"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="../controllers/logout.php"><i class="fa-solid fa-power-off"></i></a></li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link" href="connexion.php"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>