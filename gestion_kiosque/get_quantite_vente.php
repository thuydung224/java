<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;

$query = $bdd->prepare('SELECT quantite_vente.id_article article, id_ticket, qte_vente, article.nom_article nom_article,
article.prix_vente_HT, article.tva tva
FROM 
quantite_vente
LEFT JOIN article
ON
quantite_vente.id_article = article.id_article
');

$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
?>