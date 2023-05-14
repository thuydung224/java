<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('UPDATE commande 
SET id_fournisseur = :id_fournisseur, libelle_commande = :libelle_commande, date_commande = :date_commande
WHERE id_commande = :id_commande');

$id_commande = $_POST['id_commande'];
$id_fournisseur = $_POST['id_fournisseur'];
$libelle_commande = $_POST['libelle_commande'];
$date_commande = $_POST['date_commande'];
$query->execute(['id_commande' => $id_commande, 'id_fournisseur' => $id_fournisseur, 'libelle_commande' => $libelle_commande,
'date_commande' => $date_commande]);
$conts = $query->fetchAll();
echo json_encode($conts);
?>