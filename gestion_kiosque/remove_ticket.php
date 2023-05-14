<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;

$id_ticket = $_POST['id_ticket'];

$bdd = connectgestion_kiosque() ;

$reqSQL = 'DELETE FROM ticket_vente WHERE id_ticket = :id_ticket;
DELETE FROM quantite_vente WHERE id_ticket = :id_ticket' ;

$rem_tik = $bdd->prepare($reqSQL) ;
$rem_tik->execute([ 'id_ticket' => $id_ticket]) ;

echo ("<h6>Suppression effectuée</h6>") ;
?>