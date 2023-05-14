<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;

$id_article = $_GET['id_article'];

$query = $bdd->prepare('UPDATE article
SET stock = 0
WHERE id_article = :id_article
');
$query->execute(['id_article' => $id_article]);
$conts = $query->fetchAll();
echo json_encode($conts);
?>