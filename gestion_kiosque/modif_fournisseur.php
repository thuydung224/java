<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
include_once 'connexion.php' ;
$data = $_POST;
var_dump($_POST);
$id_fournisseur = $_POST['id_fournisseur'] ;
$nom_fournisseur = $_POST['nom_fournisseur'] ;
$num_voie = $_POST['num_voie'] ;
$nom_voie = $_POST['num_voie'] ;
$code_postal = $_POST['code_postal'] ;
$ville = $_POST['ville'] ;
$email = $_POST['email'] ;
$telephone = $_POST['telephone'] ;
$pays_fournisseur = $_POST['pays_fournisseur'] ;
$TVA_fournisseur = $_POST['TVA_fournisseur'] ;

$bdd = connectgestion_kiosque();
$reqSQL = 'UPDATE Fournisseur SET id_fournisseur = :id, nom_fournisseur = :nom_fournisseur, num_voie = :num_voie, nom_voie = :nom_voie, 
code_postal = :code_postal, ville = :ville, email = :email, telephone = :telephone, pays_fournisseur = :pays_fournisseur, TVA_fournisseur = :TVA_fournisseur
WHERE id_fournisseur = :id' ;
$modif_fournisseur = $bdd->prepare($reqSQL) ;
$modif_fournisseur->execute(
[ 'id' => $id_fournisseur,
'nom_fournisseur' => $nom_fournisseur,
'num_voie' => $num_voie,
'nom_voie' => $nom_voie,
'code_postal' => $code_postal,
'ville' => $ville,
'email' => $email,
'telephone' => $telephone,
'pays_fournisseur' => $pays_fournisseur,
'TVA_fournisseur' => $TVA_fournisseur]) ;
$modif_fournisseur->closeCursor() ;
?>