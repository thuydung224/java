<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
if ((!isset($_POST['id_fournisseur'])) || (!isset($_POST['nom_fournisseur'])))
echo ('Il faut au moins un id fournisseur, un nom de fournisseur') ;

else {
$id_fournisseur= $_POST['id_fournisseur'] ;
$nom_fournisseur = $_POST['nom_fournisseur'] ;
$num_voie= $_POST['num_voie'] ;
$nom_voie = $_POST['nom_voie'] ;
$code_postal = $_POST['code_postal'] ;
$ville = $_POST['ville'] ;
$email = $_POST['email'] ;
$telephone= $_POST['telephone'] ;
$pays_fournisseur= $_POST['pays_fournisseur'] ;
$TVA_fournisseur= $_POST['TVA_fournisseur'] ;


$bdd = connectgestion_kiosque() ;
$reqSQL = 'INSERT INTO Fournisseur (id_fournisseur, nom_fournisseur, num_voie, nom_voie, code_postal, ville, email, 
telephone, pays_fournisseur, TVA_fournisseur)
 VALUES (:id_fournisseur, :nom_fournisseur, :num_voie, :nom_voie, :code_postal, :ville, :email, 
:telephone, :pays_fournisseur, :TVA_fournisseur)';
$insert_fournisseur = $bdd->prepare($reqSQL) ;
$insert_fournisseur->execute([ 'id_fournisseur' => $id_fournisseur, 'nom_fournisseur' => $nom_fournisseur,
 'num_voie' => $num_voie,
'nom_voie' => $nom_voie,
'code_postal' => $code_postal, 'ville' => $ville, 'email' => $email,
'telephone' => $telephone, 'pays_fournisseur' => $pays_fournisseur,
'TVA_fournisseur' => $TVA_fournisseur ]) ;
echo ("<h6>Ajout effectué</h6>") ; 
} ?>