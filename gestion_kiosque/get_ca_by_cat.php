<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;

$query = $bdd->prepare('SELECT 
SUM(quantite_vente.qte_vente * article.prix_vente_HT) tt,
SUM(quantite_vente.qte_vente) qte,
article.libelle lib
FROM
quantite_vente
LEFT JOIN
article
ON quantite_vente.id_article = article.id_article
GROUP BY lib
ORDER BY qte DESC
');
$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
?>