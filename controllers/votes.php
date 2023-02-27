<?php
 
require('../model/connect-bdd.php');
 
if(isset($_POST['id']) AND !empty($_POST['id'])) {
$getid = (int) $_POST['id_acteur']; // Récup de l'id de l'Article contenu ds l'
$getiduser = (int) $_POST['id_user']; // Récup de l'id de l'User contenu ds l'url
 
 
$req = $bdd->prepare('SELECT id FROM votes WHERE idpost = ? AND iduser = ?');
$req->execute(array($getid, $getiduser));
 
$res = $req->fetch();
 
if (!$res) {
         
    $reqins = $bdd->query('INSERT INTO likes(idpost, iduser) VALUES (\''.$getid.'\', \''.$getiduser.'\')');
     
    $requp = $bdd->query('UPDATE likes SET likes = likes + 1');
     
} else {
     
    $reqbs = $bdd->query('UPDATE likes SET likes = likes - 1');
     
}
 
}
 