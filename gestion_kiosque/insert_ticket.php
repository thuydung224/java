<?php
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$count = $_POST['count'] ;
$bdd = connectgestion_kiosque() ;

$qteSQL = 'INSERT INTO quantite_vente (id_ticket, id_article, qte_vente)
 VALUES (:id_ticket, :id_article, :qte_vente)' ;


$cmdSQL = 'INSERT INTO ticket_vente (id_ticket, date_vente)
 VALUES (:id_ticket, :date_vente)' ;

$id_ticket = $_POST['id_ticket'];
$date_vente = $_POST['date_vente'];

for ($c = 1; $c <= $count; $c++) {

$insertQte = $bdd->prepare($qteSQL) ;
$id_article = $_POST['id_article_' . $c];
$qte_vente = $_POST['quantite_' . $c];
$insertQte->execute([ 'id_ticket' => $id_ticket, 'id_article' => $id_article,
'qte_vente' => $qte_vente]);

}
$insertCmd = $bdd->prepare($cmdSQL) ;
$insertCmd->execute([ 'id_ticket' => $id_ticket, 'date_vente' => $date_vente]);
echo ("<h3>Ajout de ticket effectué</h3>") ;
?>