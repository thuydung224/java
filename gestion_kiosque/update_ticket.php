<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);


$id_ticket = $_POST['id_ticket'] ;
$date_vente = $_POST['date_vente'] ;

// $bdd = connectgestion_kiosque();
// $reqSQL = 'UPDATE livraison SET date_livraison = :date_livraison
// WHERE id_livraison = :id_livraison AND id_commande = :id_commande' ;

// $update_livraison = $bdd->prepare($reqSQL) ;
// $update_livraison->execute(
// [
//     'date_livraison' => $date_livraison,
//     'id_livraison' => $id_livraison,
//     'id_commande' => $id_commande,
// ]) ;
// $update_livraison->closeCursor() ;

echo 'rien ne s\'est passé';

?>