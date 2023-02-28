<?php
session_start();
ob_start();

// Data (données qui transitent dans la requête HTTP)
$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_ADD_SLASHES);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_ADD_SLASHES);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$reponse = filter_input(INPUT_POST,'reponse', FILTER_SANITIZE_ADD_SLASHES);
$username = $_SESSION['username'];


// Création du hash à partir du password
// $hash = password_hash($password, PASSWORD_DEFAULT);

// Connexion à la BDD
require('../models/connect-bdd.php');
    $sql = "UPDATE users SET 
        nom = '$nom',
        prenom = '$prenom',
        email= '$email',
        reponse = '$reponse'
        WHERE username = :username";
    $req = $bdd->prepare($sql);
 
    $req->execute(array(

        'username' => $username
    ));



// Requête pour enregistrer les informations de l'utilisateur
$res = $req->rowCount(); // Comptage des lignes insérées

// Enregitrer le message d'erreur en SESSION
$_SESSION['error'] = $err;

// Redirection suivant le résultat (Si au moins une ligne est insérée)
if ($res) {
    // Rediriger vers l'accueil
    header('Location: ../views/dashboard.php');
    exit();
} else  {
    // Sinon : on redirige vers une page d'erreur.
    header('Location: ../views/erreur.php');
    exit;
}