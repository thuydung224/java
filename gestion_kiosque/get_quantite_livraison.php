<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('SELECT quantite_livraison.id_article article, id_livraison, qte_livraison, article.nom_article nom_article FROM 
quantite_livraison
LEFT JOIN article
ON
quantite_livraison.id_article = article.id_article
');
$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
?>