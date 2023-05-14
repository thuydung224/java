<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);


$id_livraison = $_POST['id_livraison'] ;
$id_commande = $_POST['id_commande'] ;
$date_livraison = $_POST['date_livraison'] ;

$bdd = connectgestion_kiosque();
$reqSQL = 'UPDATE livraison SET date_livraison = :date_livraison
WHERE id_livraison = :id_livraison AND id_commande = :id_commande' ;

$update_livraison = $bdd->prepare($reqSQL) ;
$update_livraison->execute(
[
    'date_livraison' => $date_livraison,
    'id_livraison' => $id_livraison,
    'id_commande' => $id_commande,
]) ;
$update_livraison->closeCursor() ;
?>