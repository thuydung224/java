<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$deleteCommande = $bdd->prepare('DELETE FROM commande WHERE id_commande = :id_commande');
$deleteCommandeList = $bdd->prepare('DELETE FROM quantite_commande WHERE id_commande = :id_commande');

$id_commande = $_GET['id_commande'];
$deleteCommande->execute(['id_commande' => $id_commande]);
$deleteCommandeList->execute(['id_commande' => $id_commande]);
$conts = $deleteCommande->fetchAll();
echo json_encode($conts);
$conts = $deleteCommandeList->fetchAll();
echo json_encode($conts);
?>