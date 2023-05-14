<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$bdd = connectgestion_kiosque() ;


$cmdSQL = 'INSERT INTO livraison (id_livraison, id_commande, date_livraison)
 VALUES (:id_livraison, :id_commande, :date_livraison)
 ON DUPLICATE KEY
 UPDATE date_livraison = :date_livraison' ;

$id_livraison = $_POST['id_livraison'];
$date_livraison = $_POST['date_livraison'];
$id_commande = $_POST['id_commande'];

$insertCmd = $bdd->prepare($cmdSQL) ;
$insertCmd->execute([ 'id_commande' => $id_commande, 'id_livraison' => $id_livraison,
'date_livraison' => $date_livraison]);
echo ("<h6>Ajout de commande effectué</h6>") ;
?>