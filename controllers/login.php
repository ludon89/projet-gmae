<?php
// On démarre une session
session_start();

// Data
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ADD_SLASHES);

// Connexion à la BDD
require('../model/connect-bdd.php');

// Requête pour vérifier l'existance de l'email
$sql = "SELECT * FROM users WHERE email='$email'";
$req = $bdd->query($sql); // Execution de la requête
$res = $req->fetch(PDO::FETCH_ASSOC); // Lecture du résultat de la requête

// Si la requête renvoi un résultat
if ($res) {
    // Vérification du password avec le hash stocké en BDD
    $passwordCheck = password_verify($password, $res['pass']);

    // Si la reqûete trouve l'email et que le password correspond
    if ($passwordCheck) {
        // Enregistrement des infos du user connecté
        $_SESSION['user'] = array(
            'id' => $res['id_user'],
            'name' => $res['name'],
            'email' => $res['email'],
            'phone' => $res['phone']
        );
        // Rediriger vers le dashbord du user
        header('Location: dashboard.php');
        exit();
    }
}

// Redirection par défaut
$_SESSION['error'] = "Identifiants invalides !";
// Sinon : on redirige vers une page d'erreur.
header('Location: erreur.php');
exit;
