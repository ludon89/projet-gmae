<?php
// On démarre une session
session_start();



// Data
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_ADD_SLASHES);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_ADD_SLASHES);

// Connexion à la BDD
require('../model/connect-bdd.php');

// Requête pour vérifier l'existance de l'user


$req = $bdd->query("SELECT * FROM users WHERE username='$username'  "); // Execution de la requête
// $req->bindParam(':username', $username);
// $req->bindParam(':password', $password);
// $req->execute(); // Execution de la requête
// var_dump($req);
$res = $req->fetch(PDO::FETCH_ASSOC); // Lecture du résultat de la requête
// Si la requête renvoi un résultat
if (isset($email)) {
    // Vérification du password avec le hash stocké en BDD
    // $passwordCheck = password_verify($password, $res['pass']);
    // var_dump('ok2');
    // // Si la reqûete trouve l'email et que le password correspond
    // if ($passwordCheck) {
        // Enregistrement des infos du user connect
        header('Location: ../inscription.php');    
        // Rediriger vers le dashbord du user
        // header('Location: ../dashboard.php');
        // exit();
    // }
}else if ($res) {
    
    $_SESSION['user'] = array( 
        'username' => $res['username'],
        "nom" => $res["nom"],
        'email' => $res['email'],
        'prenom' => $res['prenom']
        // 'pass' => $res['pass']
    );
    header('Location: ../dashboard.php');
}

// // Redirection par défaut
// $_SESSION['error'] = "Identifiants invalides !";
// // Sinon : on redirige vers une page d'erreur.
// header('Location: erreur.php');
// exit;
