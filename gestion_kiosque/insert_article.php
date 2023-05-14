<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
if ((!isset($_POST['id_article'])) || (!isset($_POST['nom_article'])))
echo ('Il faut au moins un id_article, un nom_article') ;

else {
$id_article= $_POST['id_article'] ;
$nom_article = $_POST['nom_article'] ;
$parution= $_POST['parution'] ;
$stock = $_POST['stock'] ;
$prix_achat_HT = $_POST['prix_achat_HT'] ;
$prix_vente_HT = $_POST['prix_vente_HT'] ;
$libelle = $_POST['libelle'] ;
$taux_commission= $_POST['taux_commission'] ;
$tva= $_POST['tva'] ;

$bdd = connectgestion_kiosque() ;
$reqSQL = 'INSERT INTO Article (id_article, nom_article, parution, stock,prix_achat_HT,prix_vente_HT,libelle,taux_commission, tva)
 VALUES (:id_article, :nom_article, :parution, :stock, :prix_achat_HT, :prix_vente_HT, :libelle, :taux_commission, :tva)' ;
$insertArticle = $bdd->prepare($reqSQL) ;
$insertArticle->execute([ 'id_article' => $id_article, 'nom_article' => $nom_article,
 'parution' => $parution,
'stock' => $stock,
'prix_achat_HT' => $prix_achat_HT, 'prix_vente_HT' => $prix_vente_HT,
'libelle' => $libelle, 'taux_commission' => $taux_commission,
'tva' => $tva ]) ;
echo ("<h6>Ajout effectué</h6>") ; } ?>