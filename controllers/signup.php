<?php

// Data (données qui transitent dans la requête HTTP)
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_ADD_SLASHES);
$prenom = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_ADD_SLASHES);
// $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ADD_SLASHES);

// Debug
//var_dump($name, $phone, $email, $password);
//die; // Pour stopper le code ici !

// Création du hash à partir du password
// $hash = password_hash($password, PASSWORD_DEFAULT);

// Connexion à la BDD
require('../model/connect-bdd.php');

// Requête pour enregistrer les informations de l'utilisateur
$sql = "INSERT INTO users VALUES('', '$email', '$name', '$pass')";

// Gestion des erreurs : On essaie d'executer la requête
$err = null;
try {
    $req = $bdd->query($sql); // Execution de la requête
    $res = $req->rowCount(); // Comptage des lignes insérées
    $err = "Votre compte est bien créé.";
} catch(PDOException $error) {
    // Lorsqu'un email existe déja (DUPLICATE ENTRY)
    if ($error->errorInfo[1] === 1062) {
        $err = "adresse email déja existante !";
    }
}

// Enregitrer le message d'erreur en SESSION
session_start();
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
