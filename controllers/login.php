<?php
// On démarre une session
session_start();
ob_start();

// Data
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_ADD_SLASHES);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ADD_SLASHES);
$_SESSION['username'] = $_POST['username'];

// Connexion à la BDD
require('../models/connect-bdd.php');

// Requête pour vérifier l'existance de l'user


$sql = "SELECT * FROM users
WHERE username = :username";
$req = $bdd->prepare($sql);

$req->execute(array(
'username' => $_SESSION['username']
));




// Si la requête renvoi un résultat

// changement romsma
while ($res = $req->fetch(PDO::FETCH_ASSOC)) {

    if ($res['email']) {

        $_SESSION['user'] = array(
            'username' => $res['username'],
            "nom" => $res["nom"],
            'email' => $res['email'],
            'prenom' => $res['prenom']
        );
        header('Location: ../views/accueil.php');
        exit();
    } else {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        header('Location: ../views/inscription.php');
    }
}



// Redirection par défaut
$_SESSION['error'] = "Identifiants invalides !";
// // Sinon : on redirige vers une page d'erreur.
// header('Location: ../views/erreur.php');
exit;