<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$bdd = connectgestion_kiosque() ;


$cmdSQL = 'INSERT INTO ticket_vente (id_ticket, date_vente)
 VALUES (:id_ticket, :date_vente)';

$id_ticket = $_POST['id_ticket'];
$date_vente = $_POST['date_vente'];

$insertCmd = $bdd->prepare($cmdSQL) ;
$insertCmd->execute([ 'id_ticket' => $id_ticket, 'date_vente' => $date_vente]);
echo ("<h6>Ajout de commande effectué</h6>") ;
?>