<?php
header("Access-Control-Allow-Origin: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('SELECT * from commande');
$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
?>