<?php

// Data (données qui transitent dans la requête HTTP)
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_ADD_SLASHES);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ADD_SLASHES);

// Création du hash à partir du password
// $hash = password_hash($password, PASSWORD_DEFAULT);

// Connexion à la BDD
require('../models/connect-bdd.php');

// Requête pour enregistrer les informations de l'utilisateur
$sql = "INSERT INTO users VALUES('', '$username', '', '$password', '', '', '')";

// Gestion des erreurs : On essaie d'executer la requête
$err = null;
try {
    $req = $bdd->query($sql); // Execution de la requête
    $res = $req->rowCount(); // Comptage des lignes insérées
    $err = "L'utilisateur a bien été ajouté !";
} catch(PDOException $error) {
    // Lorsqu'un email existe déja (DUPLICATE ENTRY)
    if ($error->errorInfo[1] === 1062) {
        $err = "Identifiant déja existant !";
    }
}

// Enregitrer le message d'erreur en SESSION
session_start();
$_SESSION['error'] = $err;

// Redirection suivant le résultat (Si au moins une ligne est insérée)
if ($res) {
    // Rediriger vers l'accueil
    header('Location: ../views/adduser.php');
    exit();
} else {
    // Sinon : on redirige vers une page d'erreur.
    header('Location: ../views/erreur.php');
    exit;
}


