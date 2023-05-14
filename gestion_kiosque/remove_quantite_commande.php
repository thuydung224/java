<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('DELETE FROM quantite_commande WHERE id_article = :id_article');
$id_article = $_POST['id_article'];
$query->execute(['id_article' => $id_article]);
$conts = $query->fetchAll();
echo json_encode($conts);
?>