<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$bdd = connectgestion_kiosque() ;


$cmdSQL = 'INSERT INTO quantite_livraison (id_article, id_livraison, qte_livraison)
 VALUES (:id_article, :id_livraison, :qte_livraison)
 ON DUPLICATE KEY
 UPDATE qte_livraison = :qte_livraison' ;


$id_article = $_POST['id_article'];
$id_livraison = $_POST['id_livraison'];
$qte_livraison = $_POST['qte_livraison'];


$insertCmd = $bdd->prepare($cmdSQL) ;
$insertCmd->execute([ 'id_article' => $id_article, 'id_livraison' => $id_livraison,
'qte_livraison' => $qte_livraison]);
echo ("<h6>Ajout de commande effectué</h6>") ;
?>