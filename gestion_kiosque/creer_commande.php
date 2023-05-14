<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$bdd = connectgestion_kiosque() ;


$cmdSQL = 'INSERT INTO commande (id_commande, id_fournisseur, libelle_commande, date_commande)
 VALUES (:id_commande, :id_fournisseur, :libelle_commande, :date_commande)' ;

$id_fournisseur = $_POST['id_fournisseur'];
$libelle_commande = $_POST['libelle_commande'];
$date_commande = $_POST['date_commande'];
$id_commande = $_POST['id_commande'];

$insertCmd = $bdd->prepare($cmdSQL) ;
$insertCmd->execute([ 'id_commande' => $id_commande, 'id_fournisseur' => $id_fournisseur,
'libelle_commande' => $libelle_commande, 'date_commande' => $date_commande]);
echo ("<h6>Ajout de commande effectué</h6>") ;
?>