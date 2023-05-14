<?php
include_once 'connexion.php' ;
$id = $_GET['id_article'] ;
$bdd = connectgestion_kiosque() ;
$reqSQL = 'DELETE FROM Article WHERE id_article = :id' ;
$supp_article = $bdd->prepare($reqSQL) ;
$supp_article->execute([ 'id' => $id]) ;
echo ("<h6>Suppression effectuée</h6>") ;
?>