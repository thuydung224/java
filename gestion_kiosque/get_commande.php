<?php
header("Access-Control-Allow-Origin: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;

if (isset($_GET['id_commande'])) {
$query = $bdd->prepare('Select * from commande where id_commande = :id');
$id = $_GET['id_commande'];
$query->execute(['id' => $id]);
$conts = $query->fetch();
echo json_encode($conts);
} else {
    $query = $bdd->prepare('Select * from commande');
    $query->execute();
    $conts = $query->fetchAll();
    echo json_encode($conts);
}
?>
