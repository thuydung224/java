<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;

$query = $bdd->prepare('SELECT id_article, sum(qte_commande) qte_vente, date_commande 
FROM quantite_commande 
LEFT JOIN commande 
ON quantite_commande.id_commande = commande.id_commande 
WHERE date_commande = :date_vente GROUP BY id_article, date_commande;');

$date_vente = $_GET['date_vente'];
$query->execute(['date_vente' => $date_vente]);
$conts = $query->fetchAll();
echo json_encode($conts);
?>