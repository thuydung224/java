<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;

if (isset($_GET['id_ticket'])) {
$query = $bdd->prepare('Select * from ticket_vente where id_ticket = :id_ticket');
$id_ticket = $_GET['id_ticket'];
$query->execute(['id_ticket' => $id_ticket]);
$conts = $query->fetch();
echo json_encode($conts);
} else {
$query = $bdd->prepare('Select * from ticket_vente');
$query->execute();
$conts = $query->fetchAll();
echo json_encode($conts);
}
?>