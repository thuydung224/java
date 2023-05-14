<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$bdd = connectgestion_kiosque() ;

$qteSQL = 'INSERT INTO quantite_commande (id_article, id_commande, qte_commande)
 VALUES (:id_article, :id_commande, :qte_commande)
 ON DUPLICATE KEY
 UPDATE
 qte_commande = :qte_commande
 ' ;


$id_commande = $_POST['id_commande'];
$insertQte = $bdd->prepare($qteSQL) ;
$id_article = $_POST['id_article'];
$qte_commande = $_POST['quantite'];
$insertQte->execute([ 'id_article' => $id_article, 'id_commande' => $id_commande,
'qte_commande' => $qte_commande]);

echo ("<h6>Ajout de commande effectué</h6>") ;
?>