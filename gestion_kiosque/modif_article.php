<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$id = $_POST['id'] ;
$nom_article = $_POST['nom_article'] ;
$parution = $_POST['parution'] ;
$stock = $_POST['stock'] ;
$prix_achat_HT = $_POST['prix_achat_HT'] ;
$prix_vente_HT = $_POST['prix_vente_HT'] ;
$libelle = $_POST['libelle'] ;
$taux_commission = $_POST['taux_commission'] ;
$tva = $_POST['tva'] ;

$bdd = connectgestion_kiosque();
$reqSQL = 'UPDATE Article SET id_article = :id, nom_article = :nom_article,
parution = :parution, stock = :stock, prix_achat_HT = :prix_achat_HT, prix_vente_HT = :prix_vente_HT, libelle =:libelle,
taux_commission = :taux_commission, tva = :tva
 WHERE id_article = :id' ;
$modif_article = $bdd->prepare($reqSQL) ;
$modif_article->execute(
[ 'id' => $id,
'nom_article' => $nom_article,
'parution' => $parution,
'stock' => $stock,
'prix_achat_HT' => $prix_achat_HT,
'prix_vente_HT' => $prix_vente_HT,
'libelle' => $libelle,
'taux_commission' => $taux_commission,
'tva' => $tva]) ;
$modif_article->closeCursor() ;
?>