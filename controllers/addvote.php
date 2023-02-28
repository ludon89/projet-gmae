<?php
session_start();

// Data
$idUser = $_SESSION["user"];
$idActeur = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
// $vote = ;

// Requête et exécution ajout vote (like ou dislike)
// if ($idUser) {
//     $sql = "
//     INSERT INTO votes
//     VALUES
//         (
//             '', '$idActeur', '$idUser', '$vote'
//         )
//     ";
// };
