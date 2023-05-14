<?php
header("Access-Control-Allow-Origin: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
if (isset($_GET['id_fournisseur'])) {
$query = $bdd->prepare('Select * from fournisseur where id_fournisseur = :id');
$id = $_GET['id_fournisseur'];
$query->execute(['id' => $id]);
$conts = $query->fetch();
echo json_encode($conts);
} else {
$query = $bdd->prepare('Select * from fournisseur');
$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
}
?>