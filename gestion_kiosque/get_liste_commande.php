<?php
header("Access-Control-Allow-Origin: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('Select * from quantite_commande where id_commande = :id');
$id = $_GET['id_commande'];
$query->execute(['id' => $id]);
$conts = $query->fetchAll();
echo json_encode($conts);
?>