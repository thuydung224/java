<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('INSERT INTO quantite_commande (id_article, id_commande, qte_commande)
VALUES (:id_article, :id_commande, :qte)
ON DUPLICATE KEY
UPDATE qte_commande = :qte');

$id_commande = $_POST['id_commande'];
echo $id_commande;
$id_article = $_POST['id_article'];
$qte = $_POST['qte_commande'];
$query->execute(['id_commande' => $id_commande, 'qte' => $qte, 'id_article' => $id_article]);
$conts = $query->fetchAll();
echo json_encode($conts);
?>