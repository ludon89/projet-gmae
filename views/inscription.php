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
    <!-- Header-->
    <!-- <?php require('../template/header.php'); ?> -->
            <!-- Page content-->
            <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto my-5">
                    <h2 class="display-4">Veuillez renseigner ces champs</h2>
                    <!-- Formulaire -->
                    <form method="post" action="traitement/signup.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Prénom</label>
                            <input type="text" id="prenom" name="prenom" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Ne partagez jamais votre email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="quest" class="form-label">Question secrète</label><br>
                            <select name="quest" id="quest">
                                <option value="Choisissez votre question."></option>
                                <option value="">Quel est le nom de votre premier animal de compagnie ?</option>
                                <option value="">Quel est le nom de jeune fille de votre mère ?</option>
                                <option value="">QUel etait votre surnom d'enfance?</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rep">Réponse secrète</label>
                            <input type="text" id="rep" class="form-control" required>

                        </div>    

                        <button type="submit" class="btn btn-success">Valider</button>
                        <!-- <a href="connexion.php">ou Se connecter</a> -->
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
