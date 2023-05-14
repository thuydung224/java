<?php
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$count = $_POST['count'] ;
$bdd = connectgestion_kiosque() ;

$qteSQL = 'INSERT INTO quantite_livraison (id_article, id_livraison, qte_livraison)
 VALUES (:id_article, :id_livraison, :qte_livraison)' ;


$cmdSQL = 'INSERT INTO livraison (id_livraison, id_commande, date_livraison)
 VALUES (:id_livraison, :id_commande, :date_livraison)' ;

$id_commande  = $_POST['id_commande'];
$date_livraison = $_POST['date_livraison'];
$id_livraison= $_POST['id_livraison'];

for ($c = 1; $c <= $count; $c++) {

$insertQte = $bdd->prepare($qteSQL) ;
$id_article = $_POST['id_article_' . $c];
$qte_livraison = $_POST['quantite_' . $c];
$insertQte->execute([ 'id_article' => $id_article, 'id_livraison' => $id_livraison,
'qte_livraison' => $qte_livraison]);

}
$insertCmd = $bdd->prepare($cmdSQL) ;
$insertCmd->execute([ 'id_livraison' => $id_livraison, 'id_commande' => $id_commande, 'date_livraison' => $date_livraison]);
echo ("<h3>Ajout de livraison effectué</h3>") ;