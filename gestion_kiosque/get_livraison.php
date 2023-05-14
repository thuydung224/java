<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;

if (isset($_GET['id_livraison'])) {
$query = $bdd->prepare('Select * from livraison where id_livraison = :id_livraison');
$id_livraison = $_GET['id_livraison'];
$query->execute(['id_livraison' => $id_livraison]);
$conts = $query->fetch();
echo json_encode($conts);
} else {
$query = $bdd->prepare('Select * from livraison');
$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
}
?>