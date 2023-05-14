<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$id = $_GET['id_fournisseur'] ;
$bdd = connectgestion_kiosque() ;
$reqSQL = 'DELETE FROM Fournisseur WHERE id_fournisseur = :id' ;
$supp_fournisseur = $bdd->prepare($reqSQL) ;
$supp_fournisseur->execute([ 'id' => $id]) ;
echo ("<h6>Suppression effectuée</h6>") ;
?>