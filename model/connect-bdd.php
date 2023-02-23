<?php
// Infos de connexion
$host = "localhost"; // Adresse du serveur
$dbname = "tp-projet";
$user = "root"; // Par défaut avec XAMPP c'est "root"
$pass = ""; // Par défaut sous XAMMP, il n'y a pas de password -> ""

// Connexion à la BDD
try {
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    // Debug
    //var_dump($error);
    //die;
    header('Location: ../erreur.php');
    exit;
}