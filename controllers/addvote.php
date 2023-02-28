<?php
session_start();

// Connexion à la BDD
require('../models/connect-bdd.php');

// Data
$idActeur = $_SESSION["acteurs"]["id_acteur"];
$idUser = $_SESSION["user"]["username"];
$vote = $_POST["vote"];
$vote = intval($vote);

var_dump($idActeur, $idUser, $vote);

// Requête et exécution ajout vote (like ou dislike)
if ($idUser) {
    $sql = "
    INSERT INTO votes (id_vote, id_acteur, id_user, vote)
    VALUES ('', '$idActeur', '$idUser', vote)
    ";
    $req = $bdd->query($sql);
};
