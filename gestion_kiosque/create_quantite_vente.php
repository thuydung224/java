<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$bdd = connectgestion_kiosque() ;

$qteSQL = 'INSERT INTO quantite_vente (id_article, id_ticket, qte_vente)
 VALUES (:id_article, :id_ticket, :qte_vente)' ;


$id_ticket = $_POST['id_ticket'];
$insertQte = $bdd->prepare($qteSQL) ;
$id_article = $_POST['id_article'];
$qte_vente = $_POST['qte_vente'];
$insertQte->execute([ 'id_article' => $id_article, 'id_ticket' => $id_ticket,
'qte_vente' => $qte_vente]);

echo ("<h6>Ajout de commande effectué</h6>") ;
?>