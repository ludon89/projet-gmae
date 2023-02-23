<?php
// On démarre une session
session_start();

// Data
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ADD_SLASHES);

// Connexion à la BDD
require('../model/connect-bdd.php');

// Requête pour vérifier l'existance de l'email
$req = $bdd->prepare("SELECT * FROM users WHERE email='$email'"); // Execution de la requête
$res = $req->fetch(PDO::FETCH_ASSOC); // Lecture du résultat de la requête

// Si la requête renvoi un résultat
if (isset($_SESSION['users']) && $_SESSION['users'] == true) {
    // Vérification du password avec le hash stocké en BDD
    $passwordCheck = password_verify($password, $res['pass']);

    // Si la reqûete trouve l'email et que le password correspond
    if ($passwordCheck) {
        // Enregistrement des infos du user connecté
        $_SESSION['user'] = array(
            'id' => $res['id_user'],
            'nom' => $res['nom'],
            'email' => $res['email'],
            'prenom' => $res['prenom']
        );
        // Rediriger vers le dashbord du user
        header('Location: ../dashboard.php');
        exit();
    }else {
        header('Location: erreur.php');
    }
}

// Redirection par défaut
$_SESSION['error'] = "Identifiants invalides !";
// Sinon : on redirige vers une page d'erreur.
header('Location: erreur.php');
exit;
