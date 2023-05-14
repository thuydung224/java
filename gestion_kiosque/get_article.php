<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
if (isset($_GET['id_article'])) {
$query = $bdd->prepare('Select * from article where id_article = :id');
$id = $_GET['id_article'];
$query->execute(['id' => $id]);
$conts = $query->fetch();
echo json_encode($conts);
} else {
$query = $bdd->prepare('Select * from article');
$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
}
?>