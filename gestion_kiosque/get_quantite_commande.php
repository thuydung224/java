<?php
header("Access-Control-Allow-Origin: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;

if (isset($_GET['id_commande'])){
$query = $bdd->prepare('Select * from quantite_commande where id_commande = :id');
$id = $_GET['id_commande'];
$query->execute(['id' => $id]);
$conts = $query->fetchAll();
echo json_encode($conts);
}
else {
$query = $bdd->prepare('SELECT quantite_commande.id_article id_article, id_commande, qte_commande, article.nom_article nom_article FROM 
quantite_commande
LEFT JOIN article
ON
quantite_commande.id_article = article.id_article
');
$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
}
?>