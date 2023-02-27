<?php
session_start();

// Data (données qui transitent dans la requête HTTP)
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_ADD_SLASHES);
$prenom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_ADD_SLASHES);
// $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ADD_SLASHES);
$username = $_SESSION['users']['username'];

// Debug
//var_dump($name, $phone, $email, $password);
//die; // Pour stopper le code ici !

// Création du hash à partir du password
// $hash = password_hash($password, PASSWORD_DEFAULT);

// Connexion à la BDD
require('../model/connect-bdd.php');

$err = null;

$sql = "UPDATE `users` SET
 `email`= '$email'
  WHERE `username`='$username'";

// Requête pour enregistrer les informations de l'utilisateur
$req = $bdd->query($sql); // Execution de la requête
$res = $req->rowCount(); // Comptage des lignes insérées

if ($res) {
    // Mise à jour du message d'erreur
    $err = "Votre compte est bien à jour.";
    // Mise à jour de la session (seulement les infos concernées)
    $_SESSION['users']['name'] = $name;
    $_SESSION['users']['email'] = $email;
}

// Enregitrer le message d'erreur en SESSION
$_SESSION['error'] = $err;

// Redirection suivant le résultat (Si au moins une ligne est insérée)
if ($res) {
    // Rediriger vers l'accueil
    header('Location: ../dashboard.php');
    exit();
} else {
    // Sinon : on redirige vers une page d'erreur.
    header('Location: erreur.php');
    exit;
}


// Debug
var_dump($_SESSION);
