<?php
// On démarre une session
session_start();

// Data
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_ADD_SLASHES);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ADD_SLASHES);

// Connexion à la BDD
require('../model/connect-bdd.php');

// Requête pour vérifier l'existance de l'email
$sql = "SELECT * FROM users WHERE";
$req = $bdd->prepare($sql); // Execution de la requête
$res = $req->fetch(); // Lecture du résultat de la requête
var_dump($res);
// Si la requête renvoi un résultat
if ($res) {
    // Vérification du password avec le hash stocké en BDD
    // $passwordCheck = password_verify($password, $res['pass']);
    // var_dump('ok2');
    // // Si la reqûete trouve l'email et que le password correspond
    // if ($passwordCheck) {
        // Enregistrement des infos du user connect
        $_SESSION['user'] = array(
            'id' => $res['username'],
            // 'nom' => $res['nom'],
            // 'email' => $res['email'],
            // 'prenom' => $res['prenom']
            'pass' => $res['pass']
        );
        var_dump('ok5');
        // Rediriger vers le dashbord du user
        header('Location: ../dashboard.php');
        exit();
    // }
}
var_dump('ok4');
// // Redirection par défaut
// $_SESSION['error'] = "Identifiants invalides !";
// // Sinon : on redirige vers une page d'erreur.
// header('Location: erreur.php');
// exit;
