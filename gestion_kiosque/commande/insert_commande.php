<?php
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$count = $_POST['count'] ;
$bdd = connectgestion_kiosque() ;

$qteSQL = 'INSERT INTO quantite_commande (id_article, id_commande, qte_commande)
 VALUES (:id_article, :id_commande, :qte_commande)' ;


$cmdSQL = 'INSERT INTO commande (id_commande, id_fournisseur, libelle_commande, date_commande)
 VALUES (:id_commande, :id_fournisseur, :libelle_commande, :date_commande)' ;

$id_fournisseur = $_POST['id_fournisseur'];
$libelle_commande = $_POST['libelle_commande'];
$date_commande = $_POST['date_commande'];
$id_commande = $_POST['id_commande'];

for ($c = 1; $c <= $count; $c++) {

$insertQte = $bdd->prepare($qteSQL) ;
$id_article = $_POST['id_article_' . $c];
$qte_commande = $_POST['quantite_' . $c];
$insertQte->execute([ 'id_article' => $id_article, 'id_commande' => $id_commande,
'qte_commande' => $qte_commande]);

}
$insertCmd = $bdd->prepare($cmdSQL) ;
$insertCmd->execute([ 'id_commande' => $id_commande, 'id_fournisseur' => $id_fournisseur,
'libelle_commande' => $libelle_commande, 'date_commande' => $date_commande]);
echo ("<h6>Ajout de commande effectué</h6>") ;
?>