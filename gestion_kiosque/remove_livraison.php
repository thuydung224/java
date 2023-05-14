<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;

$id_livraison = $_POST['id_livraison'];

$bdd = connectgestion_kiosque() ;
$reqSQL = 'DELETE FROM livraison WHERE id_livraison = :id_livraison;
DELETE FROM quantite_livraison WHERE id_livraison = :id_livraison' ;
$remove_liv = $bdd->prepare($reqSQL) ;
$remove_liv->execute([ 'id_livraison' => $id_livraison]) ;
echo ("<h6>Suppression effectuée</h6>") ;
?>